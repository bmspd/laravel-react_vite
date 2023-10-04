<?php

use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\Users\UsersController;
use App\Http\Middleware\EnsureUserHasRole;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', [ApiAuthController::class, 'getUserInfo']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [ApiAuthController::class, 'register']);

    Route::post('/login', [ApiAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->get('/logout', [ApiAuthController::class, 'logout']);
});

Route::group(['prefix' => 'users'], function() {
    Route::middleware(['auth:sanctum', 'role:admin'])->get('/', [UsersController::class, 'getAll']);
});
