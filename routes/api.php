<?php

use Illuminate\Support\Facades\Route;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;

//Login
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

//Posts
Route::apiResource('posts', ApiController::class)->middleware('auth:sanctum');
Route::get('/post/{id}', function (string $id) {
    return new PostResource(Post::findOrFail($id));
})->middleware('auth:sanctum');
