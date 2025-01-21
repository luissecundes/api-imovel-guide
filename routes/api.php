<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user'], function () {
    Route::post('/get-all', [UserController::class, 'index']);
    Route::post('/get', [UserController::class, 'get+']);
    Route::post('/register', [UserController::class, 'store']);
    Route::put('/edit', [UserController::class, 'update']);
    Route::delete('/delete', [UserController::class, 'delete']);
});
