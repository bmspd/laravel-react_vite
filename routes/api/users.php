<?php

use App\Http\Controllers\Api\Users\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('users')->group(function() {
    Route::get('/', [UsersController::class, 'getAll']);
    Route::get('/{userId}', [UsersController::class, 'getById']);
});
