<?php

use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\FriendRequest\FriendRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Like\LikeController;
use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisterController::class, 'showRegisterView'])->name('register');
Route::post('/register', [RegisterController::class, 'registerNewUser']);

Route::get('/register/restaurant/step/1', [RestaurantController::class, 'showRegisterRestaurantStepOneView']);
Route::get('/register/restaurant/step/2', [RestaurantController::class, 'showRegisterRestaurantStepTwoView']);
Route::post('/register/restaurant/step/1', [RestaurantController::class, 'completeRestaurantPageCreationStepOne']);
Route::post('/register/restaurant/step/2', [RestaurantController::class, 'completeRestaurantPageCreationStepTwo']);
Route::get('/register/restaurant/session', [RestaurantController::class, 'fetchSessionData']);

Route::get('/login', [AuthController::class, 'showLoginView'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/{username}', [ProfileController::class, 'showProfileView']);
Route::get('/{username}/edit', [ProfileController::class, 'editProfileView']);
Route::put('/{username}/edit', [ProfileController::class, 'updateProfile']);

Route::get('/{username}/posts/{postId}', [PostController::class, 'showPostView']);
Route::post('/posts', [PostController::class, 'addNewPost']);

Route::post('/{username}/posts/{postId}/comments', [CommentController::class, 'addNewComment']);
Route::post('/comments/{commentId}/reply', [CommentController::class, 'replyToComment']);

Route::post('/posts/{postId}/like', [LikeController::class, 'likePost']);
Route::get('/posts/{postId}/like', [LikeController::class, 'getLikeCount']);
Route::delete('/posts/{postId}/unlike', [LikeController::class, 'unlikePost']);

Route::put('/comments/{commentId}/like', [LikeController::class, 'likeComment']);
Route::delete('/comments/{commentId}/unlike', [LikeController::class, 'unlikeComment']);

Route::post('/{userFirst}/request/{userSecond}', [FriendRequestController::class, 'sendFriendRequest']);
Route::get('/{username}/friend-requests', [FriendRequestController::class, 'showFriendRequestView']);
Route::put('/friend-requests/{requestId}', [FriendRequestController::class, 'acceptFriendRequest']);
Route::delete('/friend-requests/{requestId}', [FriendRequestController::class, 'declineFriendRequest']);
Route::get('/{username}/friends', [FriendRequestController::class, 'showFriendsListView']);

Route::get('/{username}/notifications', [NotificationController::class, 'showNotificationsView']);
Route::get('/{username}/notifications-json', [NotificationController::class, 'fetchNotificationsJSON']);
Route::get('/{username}/notifications/unread/count', [NotificationController::class, 'fetchUnreadNotificationsCount']);
Route::delete('/{username}/notifications', [NotificationController::class, 'deleteAllNotifications']);

Route::get('/users/search', [SearchController::class, 'searchUser'])->name('search');

Route::get('/', [HomeController::class, 'showHomeView'])->middleware('auth')->name('home');
