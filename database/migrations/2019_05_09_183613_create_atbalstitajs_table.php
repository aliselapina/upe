<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasvaldibasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasvaldibas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->string('majaslapa');
            $table->number('numurs');
            $table->longtext('rekviziti');
            $table->image('logo');
            $table->string('atbalsta_veids');
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
        Schema::dropIfExists('pasvaldibas');
    }
}
