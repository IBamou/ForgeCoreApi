<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

/**
 * @group Authentication
 *
 * APIs for user authentication, registration, email verification, and password management.
 */
class AuthController extends Controller
{
    /**
     * Register a new user
     *
     * Creates a new user account and returns an API token.
     *
     * @response 201 scenario="success" {
     *   "token": "1|abc123...",
     *   "user": {"id": 1, "name": "John Doe", "email": "john@example.com", "created_at": "2026-01-01T00:00:00.000000Z"}
     * }
     * @response 422 scenario="validation error" {
     *   "message": "Validation failed.",
     *   "errors": {"email": ["This email is already registered."]}
     * }
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        event(new Registered($user));

        $token = $user->createToken('api-token')->plainTextToken;

        $data = [
            'token' => $token,
            'user' => UserResource::make($user),
        ];

        return response()->json($data, 201);
    }

    /**
     * Login
     *
     * Authenticates a user and returns an API token.
     *
     * @response 200 scenario="success" {
     *   "token": "1|abc123...",
     *   "user": {"id": 1, "name": "John Doe", "email": "john@example.com", "created_at": "2026-01-01T00:00:00.000000Z"}
     * }
     * @response 401 scenario="invalid credentials" {"message": "Invalid credentials"}
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = Auth::user();

        $this->cleanTokens($user, 10);

        $token = $user->createToken('api-token')->plainTextToken;

        $data = [
            'token' => $token,
            'user' => UserResource::make($user),
        ];

        return response()->json($data, 200);
    }

    /**
     * Logout
     *
     * Revokes the current API token.
     *
     * @authenticated
     *
     * @response 200 {"message": "Logged out"}
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ], 200);
    }

    /**
     * Send email verification notification
     *
     * Resends the email verification link to the authenticated user.
     *
     * @authenticated
     *
     * @response 200 {"message": "Verification link sent."}
     */
    public function sendEmailVerificationNotification(Request $request): JsonResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Verification link sent.',
        ], 200);
    }

    /**
     * Verify email
     *
     * Verifies a user's email address using the signed URL from the verification email.
     *
     * @urlParam id int required The user's ID. Example: 1
     * @urlParam hash string required The verification hash. Example: abc123def456...
     *
     * @response 200 {"message": "Email verified successfully."}
     * @response 200 scenario="already verified" {"message": "Email already verified."}
     * @response 403 {"message": "Invalid verification link."}
     */
    public function verifyEmail(Request $request, $id, $hash): JsonResponse
    {
        $user = User::findOrFail($id);

        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json([
                'message' => 'Invalid verification link.',
            ], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified.',
            ], 200);
        }

        $user->markEmailAsVerified();

        return response()->json([
            'message' => 'Email verified successfully.',
        ], 200);
    }

    /**
     * Forgot password
     *
     * Sends a password reset link to the given email address.
     *
     * @bodyParam email string required The user's email address. Example: john@example.com
     *
     * @response 200 {"message": "Password reset link sent."}
     * @response 422 {"message": "We can't find a user with that email address."}
     */
    public function forgotPassword(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset link sent.'], 200)
            : response()->json(['message' => __($status)], 422);
    }

    /**
     * Reset password
     *
     * Resets the user's password using a valid token.
     *
     * @bodyParam token string required The password reset token. Example: abc123def456
     * @bodyParam email string required The user's email address. Example: john@example.com
     * @bodyParam password string required The new password (min 8 characters). Example: new-secret-123
     * @bodyParam password_confirmation string required Must match the new password. Example: new-secret-123
     *
     * @response 200 {"message": "Password reset successfully."}
     * @response 422 {"message": "This password reset token is invalid."}
     */
    public function resetPassword(Request $request): JsonResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password reset successfully.'], 200)
            : response()->json(['message' => __($status)], 422);
    }

    public function cleanTokens(User $user, int $maxTokens): void
    {
        $tokenCount = $user->tokens()->count();

        if ($tokenCount >= $maxTokens) {
            $user->tokens()
                ->oldest()
                ->limit($tokenCount - $maxTokens + 1)
                ->delete();
        }
    }
}
