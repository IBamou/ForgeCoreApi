<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BluePrintController;
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

    Route::controller(PostController::class)->prefix('/posts')->group(function() {
        Route::get('/', 'index')->name('posts.index');
        Route::post('/store', 'store')->name('posts.store');
        Route::get('/{post}', 'show')->name('posts.show');
        Route::put('/{post}/update', 'update')->name('posts.update');
        Route::patch('/{post}/updateStatus', 'update')->name('posts.updateStatus');
        Route::delete('/{post}/archive', 'archive')->name('posts.archive');
        Route::post('/{post}/restore ', 'restore')->name('posts.restore');
        Route::delete('/{post}/forceDelete', 'forceDelete')->name('posts.forceDelete');
    });

    Route::controller(BluePrintController::class)->prefix('/blueprints')->group(function() {
        Route::get('/', 'index')->name('posts.index');
        Route::post('/store', 'store')->name('posts.store');
        Route::get('/{blueprint}', 'show')->name('posts.show');
        Route::put('/{blueprint}/update', 'update')->name('posts.update');
        Route::delete('/{blueprint}/archive', 'archive')->name('posts.archive');
        Route::post('/{blueprint}/restore ', 'restore')->name('posts.restore');
        Route::delete('/{blueprint}/forceDelete', 'forceDelete')->name('posts.forceDelete');
    });

});






