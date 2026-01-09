<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\MetricsController;

Route::post('/auth/token', [AuthController::class, 'token']);

Route::middleware(['auth.token', 'json.only'])->group(function () {

    Route::get('/users', [UserController::class, 'index'])->middleware('throttle:read');
    Route::get('/users/{id}', [UserController::class, 'show'])->middleware('throttle:read');

    Route::post('/users', [UserController::class, 'store'])->middleware('throttle:write');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('throttle:write');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('throttle:write');

    Route::post('/users/{id}/relationships', [RelationshipController::class, 'store'])
        ->middleware('throttle:write');

    Route::delete('/users/{id}/relationships', [RelationshipController::class, 'destroy'])
        ->middleware('throttle:write');

    Route::post('/users/{id}/hobbies', [HobbyController::class, 'store'])
        ->middleware('throttle:write');

    Route::delete('/users/{id}/hobbies', [HobbyController::class, 'destroy'])
        ->middleware('throttle:write');

    Route::get('/metrics/reputation', [MetricsController::class, 'reputation'])
        ->middleware('throttle:read');
});
