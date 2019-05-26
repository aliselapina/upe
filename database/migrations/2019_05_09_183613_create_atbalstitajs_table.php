<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtbalstitajsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atbalstitajs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->string('majaslapa')->nullable();
            $table->integer('numurs')->nullable();
            $table->longtext('epasts');
            $table->longtext('rekviziti')->nullable();
            $table->string('atbalsta_veids')->nullable();
            $table->integer('nometne_id')->unsigned()->nullable();

            $table->foreign('nometne_id')->references('id')->on('nometnes');
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
        Schema::dropIfExists('atbalstitajs');
    }
}
