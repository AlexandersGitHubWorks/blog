<?php

use App\Http\Controllers\{
    AdminPostController,
    NewsletterController,
    PostCommentController,
    PostController,
    SessionController,
    RegisterController
};
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::post('/post/{post:slug}/comment', [PostCommentController::class, 'store'])
    ->middleware('auth')
    ->name('comment.store');

Route::prefix('/admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminPostController::class, 'index'])->name('dashboard');
    Route::get('/post/create', [AdminPostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [AdminPostController::class, 'store'])->name('post.store');
    Route::get('/post/{post}/edit', [AdminPostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{post}', [AdminPostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [AdminPostController::class, 'destroy'])->name('post.destroy');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [SessionController::class, 'show'])->name('login.show');
    Route::post('/login', [SessionController::class, 'attempt'])->name('login.attempt');
});

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::post('/newsletter', NewsletterController::class);
