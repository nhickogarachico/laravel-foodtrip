<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginView'])->name('login');

Route::get('/', [HomeController::class, 'showHomeView'])->middleware('auth')->name('home');