<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('tweets', [TweetController::class, 'index'])->name('home');
    Route::post('tweets/{tweet}/like', [TweetLikesController::class, 'store']);
    Route::delete('tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);
    Route::post('tweets', [TweetController::class, 'store']);
    Route::post('profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follow');
    Route::get('profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');
    Route::get('profiles/{user:username}/edit', [ProfilesController::class, 'edit'])->name('edit')->middleware('can:edit,user');
    Route::patch('profiles/{user:username}', [ProfilesController::class, 'update'])->name('update')->middleware('can:edit,user');
    Route::get('explore', ExploreController::class);
});
