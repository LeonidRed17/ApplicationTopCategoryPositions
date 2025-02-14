<?php
/*
- 

Роут для получения данных
- Подключаться к API (Минимальная дата когда есть данные 2025-01-15)
- парсить необходимые данные
- вносить в бд 

+Получать 1 параметр в гет-роуте apptopcatergory{date}
- выводить из БД значения по дате в какой категории и какое место приложение занимало в рейтинге

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
/*
Route::get('/appTopCategory/{date}/', function ($date) {
    return view('test',['date' => $date]);
});
*/

Route::get('/appTopCategory',[MainController::class, "getAppticaTopHistoryData"]);


Route::get('/getAppTop',[TopCategoryController::class, "getAppTop"]);

