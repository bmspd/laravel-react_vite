<?php

use App\Http\Controllers\Api\Auth\ApiAuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', [ApiAuthController::class, 'getUserInfo']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [ApiAuthController::class, 'register']);

    Route::post('/login', [ApiAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->get('/logout', [ApiAuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->get('/who-am-i', [ApiAuthController::class, 'whoAmI']);
});
