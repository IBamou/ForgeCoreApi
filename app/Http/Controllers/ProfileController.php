<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Profile
 *
 * APIs for viewing and updating the authenticated user's profile.
 */
class ProfileController extends Controller
{
    /**
     * Show profile
     *
     * Returns the authenticated user's profile information.
     *
     * @authenticated
     *
     * @response 200 scenario="success" {
     *   "user": {"id": 1, "name": "John Doe", "email": "john@example.com", "created_at": "2026-01-01T00:00:00.000000Z"}
     * }
     */
    public function show(Request $request): JsonResponse
    {
        return response()->json([
            'user' => UserResource::make($request->user()),
        ], 200);
    }

    /**
     * Update profile
     *
     * Updates the authenticated user's profile fields. Requires current_password when changing password.
     *
     * @authenticated
     *
     * @response 200 {"message": "Profile updated successfully.", "user": {"id": 1, ...}}
     * @response 422 {"message": "Current password is incorrect."}
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        $user = $request->user();

        $validated = $request->validated();

        if (isset($validated['password'])) {
            if (! Hash::check($validated['current_password'], $user->password)) {
                return response()->json([
                    'message' => 'Current password is incorrect.',
                ], 422);
            }
        }

        $user->update($validated);

        return response()->json([
            'message' => 'Profile updated successfully.',
            'user' => UserResource::make($user->fresh()),
        ], 200);
    }
}
