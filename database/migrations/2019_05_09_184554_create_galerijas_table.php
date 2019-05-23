<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalerijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerijas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->longtext('apraksts');
            $table->integer('nometne_id')->unsigned()->nullable(); 
            $table->integer('user_id')->unsigned()->nullable(); 

            $table->foreign('nometne_id')->references('id')->on('nometnes');
            $table->foreign('user_id')->references('id')->on('user');
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
        Schema::dropIfExists('galerijas');
    }
}
