<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('recipient')->comment('Получатель');
            $table->string('inn')->comment('ИНН');
            $table->string('kpp')->comment('КПП');
            $table->string('bank')->comment('Банк получателя');
            $table->string('account')->comment('Счёт №');
            $table->string('bik')->comment('БИК/Код МФО');
            $table->string('ks')->comment('Корреспонденский счет');
            $table->string('address')->comment('Адрес');
            $table->string('phone')->comment('Телефон');
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
        Schema::dropIfExists('requisites');
    }
}
