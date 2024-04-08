<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

Route::get('/', function(){
    return redirect('/login');
});

//Post
Route::group(['middleware' => 'auth'], function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');
});

//Login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
