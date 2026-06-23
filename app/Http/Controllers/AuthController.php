<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $token = $user->createToken('api-token')->plainTextToken;


        $data = [
            'token' => $token,
            'user' => UserResource::collection($user),
        ];

        return response()->json($data);
    }

    public function login(LoginRequest $request)
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
            'user' => UserResource::collection($user),
        ];

        return response()->json($data);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    public function cleanTokens($user, $maxTokens)
    {
        if ($user->tokens()->count() >= $maxTokens) {
            $user->tokens()
                ->oldest()
                ->first()
                ?->delete();
        }
    }
}
