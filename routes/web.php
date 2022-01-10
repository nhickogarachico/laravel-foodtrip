<?php

use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\FriendRequest\FriendRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Search\SearchController;
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

Route::post('/{username}/posts/{postId}/comments', [CommentController::class, 'addNewComment']);
Route::post('/comments/{commentId}/reply',[CommentController::class, 'replyToComment'] );

Route::put('/posts/{postId}/like', [LikeController::class, 'likePost']);
Route::delete('/posts/{postId}/unlike', [LikeController::class, 'unlikePost']);

Route::put('/comments/{commentId}/like', [LikeController::class, 'likeComment']);
Route::delete('/comments/{commentId}/unlike', [LikeController::class, 'unlikeComment']);

Route::post('/{userFirst}/request/{userSecond}', [FriendRequestController::class, 'sendFriendRequest']);
Route::get('/{username}/friend-requests', [FriendRequestController::class, 'showFriendRequestView']);

Route::get('/users/search', [SearchController::class, 'searchUser'])->name('search');

Route::get('/', [HomeController::class, 'showHomeView'])->middleware('auth')->name('home');