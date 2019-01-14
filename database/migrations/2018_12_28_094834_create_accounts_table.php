<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned()->comment('Годовой порядковый номер');
            $table->integer('requisite_id')->unsigned()->comment('ID заполненных реквизитов');
            $table->integer('user_id')->unsigned()->comment('ID пользователя');
            $table->integer('rate_id')->unsigned()->comment('ID тарифа');
            $table->boolean('is_paid')->default(0)->comment('Статус оплаты');
            $table->boolean('is_cancelled')->default(0)->comment('Аннулирован');
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
        Schema::dropIfExists('accounts');
    }
}
