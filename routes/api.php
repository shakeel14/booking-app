<?php

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookingController;
use App\Http\Controllers\Api\V1\ServiceController;


Route::prefix('v1')
    ->group(function(){

        route::apiResource('/services',ServiceController::class);
        route::apiResource('/booking',BookingController::class);
        route::post('/booking/{booking}/confirmed',[BookingController::class,'confirmed']);
    });


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
