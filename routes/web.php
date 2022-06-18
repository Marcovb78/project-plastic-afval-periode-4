<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\FeedController::class, 'index'])->name('feed.show');

Route::get('/events/map', [App\Http\Controllers\EventsController::class, 'showMap'])->name('events.map');
Route::get('/events/{event}/join', [App\Http\Controllers\EventsController::class, 'join'])->name('events.join');
Route::post('/events/create', [App\Http\Controllers\EventsController::class, 'create'])->name('events.create');

Route::get('/profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('user.profile');
Route::post('/profile/update', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('user.profile.update');
Route::get('/profile/find-friends', [App\Http\Controllers\UserController::class, 'findFriends'])->name('user.find-friends');
Route::get('/profile/add-friend/{user}', [App\Http\Controllers\UserController::class, 'addFriend'])->name('user.add-friend');

Route::get('/settings', [App\Http\Controllers\UserController::class, 'showSettings'])->name('user.settings');
Route::get('/achievements', [App\Http\Controllers\UserController::class, 'showAchievements'])->name('user.achievements');

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/news/{article}/{slug}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
