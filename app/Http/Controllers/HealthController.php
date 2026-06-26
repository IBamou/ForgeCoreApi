<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * @group Health
 *
 * Health check endpoint.
 */
class HealthController extends Controller
{
    /**
     * Health check
     *
     * Returns the API health status.
     *
     * @response 200 {
     *   "status": "healthy",
     *   "timestamp": "2026-06-26T12:00:00.000000Z"
     * }
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'status' => 'healthy',
            'timestamp' => now()->toIso8601String(),
        ], 200);
    }
}
