<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\TransportController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('destinations', DestinationController::class);

Route::resource('events', EventController::class);


Route::resource('activities', ActivityController::class);


Route::resource('transports', TransportController::class);
