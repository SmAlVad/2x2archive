<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CsfdSaveLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csfd_save_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('count')->unsigned()->comment('Количество загруженных обьявлений');
            $table->integer('first_id')->unsigned()->comment('ID первого обьявления');
            $table->integer('last_id')->unsigned()->comment('ID последнего обьявления');
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
        Schema::dropIfExists('csfd_save_logs');
    }
}
