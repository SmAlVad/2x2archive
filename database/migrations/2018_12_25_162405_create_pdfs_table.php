<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned()->comment('Связь с таблицей газет(projects)');
            $table->string('file_name')->comment('Название файла');
            $table->integer('year')->unsigned()->comment('Год выхода');
            $table->integer('month')->unsigned()->comment('Месяц выхода');
            $table->integer('day')->unsigned()->comment('День выхода');
            $table->string('number')->comment('Намер издания');
            $table->string('created_by')->comment('Кто загрузил');
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
        Schema::dropIfExists('pdfs');
    }
}
