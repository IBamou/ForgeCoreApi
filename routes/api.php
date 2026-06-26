<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BluePrintController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'timestamp' => now()->toIso8601String(),
    ], 200);
});

Route::controller(AuthController::class)->middleware(['guest', 'throttle:auth'])->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
    Route::post('/forgot-password', 'forgotPassword')->name('password.email');
    Route::post('/reset-password', 'resetPassword')->name('password.reset');
});

Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])
    ->middleware(['throttle:auth'])
    ->name('verification.verify');

Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/email/verification-notification', [AuthController::class, 'sendEmailVerificationNotification'])
        ->middleware('throttle:auth')
        ->name('verification.send');

    Route::controller(ProfileController::class)->prefix('/profile')->group(function () {
        Route::get('/', 'show')->name('profile.show');
        Route::put('/update', 'update')->name('profile.update');
    });

    Route::controller(PostController::class)->prefix('/posts')->group(function () {
        Route::get('/', 'index')->name('posts.index');
        Route::get('/archived', 'archived')->name('posts.archived');
        Route::post('/store', 'store')->name('posts.store');
        Route::get('/{post}', 'show')->name('posts.show');
        Route::put('/{post}/update', 'update')->name('posts.update');
        Route::patch('/{post}/updateStatus', 'updateStatus')->name('posts.updateStatus');
        Route::delete('/{post}/archive', 'archive')->name('posts.archive');
        Route::post('/{post}/restore', 'restore')->name('posts.restore')->withTrashed();
        Route::delete('/{post}/forceDelete', 'forceDelete')->name('posts.forceDelete')->withTrashed();
        Route::post('/{post}/retry', 'retry')->name('posts.retry');
    });

    Route::controller(BluePrintController::class)->prefix('/blueprints')->group(function () {
        Route::get('/', 'index')->name('blueprints.index');
        Route::get('/archived', 'archived')->name('blueprints.archived');
        Route::post('/store', 'store')->name('blueprints.store');
        Route::get('/{blueprint}', 'show')->name('blueprints.show');
        Route::put('/{blueprint}/update', 'update')->name('blueprints.update');
        Route::delete('/{blueprint}/archive', 'archive')->name('blueprints.archive');
        Route::post('/{blueprint}/restore', 'restore')->name('blueprints.restore')->withTrashed();
        Route::delete('/{blueprint}/forceDelete', 'forceDelete')->name('blueprints.forceDelete')->withTrashed();
    });

    Route::controller(InputController::class)->prefix('/inputs')->group(function () {
        Route::get('/', 'index')->name('inputs.index');
        Route::get('/archived', 'archived')->name('inputs.archived');
        Route::post('/store', 'store')->name('inputs.store');
        Route::get('/{input}', 'show')->name('inputs.show');
        Route::put('/{input}/update', 'update')->name('inputs.update');
        Route::delete('/{input}/archive', 'archive')->name('inputs.archive');
        Route::post('/{input}/restore', 'restore')->name('inputs.restore')->withTrashed();
        Route::delete('/{input}/forceDelete', 'forceDelete')->name('inputs.forceDelete')->withTrashed();
    });

    Route::controller(ConversationController::class)->prefix('/conversations')->group(function () {
        Route::get('/', 'index')->name('conversations.index');
        Route::get('/archived', 'archived')->name('conversations.archived');
        Route::post('/store', 'store')->name('conversations.store');
        Route::get('/{conversation}', 'show')->name('conversations.show');
        Route::delete('/{conversation}/archive', 'archive')->name('conversations.archive');
        Route::post('/{conversation}/restore', 'restore')->name('conversations.restore')->withTrashed();
        Route::delete('/{conversation}/forceDelete', 'forceDelete')->name('conversations.forceDelete')->withTrashed();
    });

    Route::post('/conversations/{conversation}/send', [ConversationController::class, 'send'])
        ->middleware('throttle:conversations')
        ->name('conversations.send');

    Route::get('/search', [SearchController::class, 'index'])->name('search');

});
