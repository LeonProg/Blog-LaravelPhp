<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\PostManagerController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/profile', [UserController::class, 'profile']);

    Route::delete('/logout', [AuthController::class, 'logout']);
    Route::post('/posts', [PostManagerController::class, 'addPost']);
    Route::delete('/posts/{post}', [PostManagerController::class, 'delete']);
});

Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/posts', [PostController::class, 'getPosts']);
Route::get('/posts/{post}', [PostController::class, 'showPost']);