<?php

use App\Http\Controllers\Api\Contents\ContentsController;
use Illuminate\Support\Facades\Route;

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
