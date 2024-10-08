<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::post('store', [PostController::class, 'create']);
Route::post('posts/{post?}/edit', [PostController::class, 'edit']);
Route::post('posts/{post?}', [PostController::class, 'show']);
Route::post('posts/{post?}/comments', [CommentController::class, 'store'])->name('comments.store');