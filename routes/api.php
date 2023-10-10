<?php

use App\Http\Controllers\Api\Auth\ApiAuthController;
use App\Http\Controllers\Api\Contents\ContentsController;
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
    Route::middleware('auth:sanctum')->get('/who-am-i', [ApiAuthController::class, 'whoAmI']);
});

Route::middleware(['auth:sanctum', 'role:admin'])->prefix('users')->group(function() {
    Route::get('/', [UsersController::class, 'getAll']);
    Route::get('/{userId}', [UsersController::class, 'getById']);
});

Route::middleware(['auth:sanctum'])->prefix('contents')->group(function() {
   Route::get('/', [ContentsController::class, 'getContents']);
   Route::get('/{id}', [ContentsController::class, 'getContentById']);
   Route::put('/{id}/status', [ContentsController::class, 'changeUserContentStatus']);
   Route::delete('list/{id}', [ContentsController::class, 'removeContentFromUserList']);
   Route::post('/request', [ContentsController::class, 'requestContent']);
   Route::middleware(['role:admin'])->group(function () {
       Route::post('/', [ContentsController::class, 'createContent']);
       Route::patch('/{id}', [ContentsController::class, 'updateContentById']);
       Route::delete('/{id}', [ContentsController::class, 'deleteContentById']);
       Route::get('/request/{id}/cancel', [ContentsController::class, 'cancelRequestContent']);
       Route::get('/request/{id}/approve', [ContentsController::class, 'approveRequestContent']);
   });
});


