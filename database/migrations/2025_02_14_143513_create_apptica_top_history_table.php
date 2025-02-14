<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppticaTopHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('apptica_top_positions', function (Blueprint $table) {
            $table->id();  // Идентификатор
            $table->integer('position'); //Позиция в рейтинге
            $table->integer('category'); // Категория приложений 
            $table->integer('subcategory'); //Подкатегория приложения
            $table->date('date');  // Дата позиции
            $table->timestamps();  // Стандартные временные метки для created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('apptica_top_positions');
    }
}
