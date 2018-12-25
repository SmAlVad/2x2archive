<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsfdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csfds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('csfd_id')->comment('Id из базы 2x2');
            $table->string('region')->comment('Регион');
            $table->string('city')->comment('Город');
            // Категории вложены Недвижемость/Продаю/Квартиру
            // Здесь первый уровень это Недважемость
            $table->integer('cat1')->unsigned()->comment('Категория 1-го уровня');
            // Второй уровень Продаю
            $table->integer('cat2')->unsigned()->comment('Категория 2-го уровня');
            // Третий уровень Квартиру
            $table->integer('cat3')->unsigned()->comment('Категория 3-го уровня');
            $table->string('title')->comment('Заголовок');
            $table->text('body')->comment('Тело обьявления');
            $table->string('tags')->comment('Тэги');
            $table->string('price')->comment('Цена');
            $table->string('tel')->comment('Телефон');
            $table->string('email')->comment('Электронная почта');
            $table->string('name')->comment('Имя подвшего');
            $table->date('date_start')->comment('Дата подачи');
            $table->date('date_end')->comment('Дата окончания');
            $table->string('image')->comment('Путь к изображению');
            $table->text('params')->comment('Параметры');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csfds');
    }
}
