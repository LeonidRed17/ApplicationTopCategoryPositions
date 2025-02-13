<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/appTopCategory/{date}/{ass}', function ($date) {
    return view('test',['date' => $date]);
});
