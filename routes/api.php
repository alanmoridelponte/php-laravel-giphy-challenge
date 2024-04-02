<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiphyController;
use App\Http\Controllers\UserFavoriteGiphyGifController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:api')->prefix('giphy')->group(function () {
    Route::prefix('gifs')->group(function () {
        Route::get('search', [GiphyController::class, 'searchGifs']);
        Route::get('{id}', [GiphyController::class, 'getGifById']);
        Route::post('favorite', [UserFavoriteGiphyGifController::class, 'saveUserFavoriteGif']);
    });
});