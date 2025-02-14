<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Middleware\LogRequests;


Route::middleware([LogRequests::class, 'throttle:5,1'])
    ->get('/appTopCategory/{date}', [MainController::class, "getAppTopCategory"]);
