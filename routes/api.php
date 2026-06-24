<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BluePrintController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');
})->middleware('guest');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
        Route::post('/{post}/retry', 'retry')->name('posts.retry')->withTrashed();
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

});
