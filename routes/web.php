<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register');
Route::post('/register', [RegisterController::class, 'registerNewUser']);

Route::get('/login', [AuthController::class, 'showLoginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/{username}', [ProfileController::class, 'showProfileView']);
Route::get('/{username}/edit', [ProfileController::class, 'editProfileView']);
Route::put('/{username}/edit', [ProfileController::class, 'updateProfile']);

Route::get('/{username}/posts/{postId}', [PostController::class, 'showPostView']);
Route::post('/posts', [PostController::class, 'addNewPost']);

Route::get('/', [HomeController::class, 'showHomeView'])->middleware('auth')->name('home');