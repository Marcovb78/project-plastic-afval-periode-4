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

Route::get('/profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('user.profile');
Route::get('/settings', [App\Http\Controllers\UserController::class, 'showSettings'])->name('user.settings');
Route::get('/achievements', [App\Http\Controllers\UserController::class, 'showAchievements'])->name('user.achievements');
