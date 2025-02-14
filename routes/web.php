<?php
/*

Дополнительно
- Добавить ограничение по количеству запросов на endpoint с одного ip-адреса: 5 запросов в минуту.
- Добавить логирование запросов на endpoint. 
*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TopCategoryController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/appTopCategory/{date}',[MainController::class, "getAppTopCategory"]);
