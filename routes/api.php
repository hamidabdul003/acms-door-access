<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeviceApiController;
use App\Http\Controllers\Api\AccessApiController;

Route::prefix('device')->group(function () {

    Route::post(
        '/heartbeat',
        [DeviceApiController::class, 'heartbeat']
    );


    Route::post(
        '/access',
        [AccessApiController::class,'check']
    );

});
