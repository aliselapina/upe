<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokuments', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('user_id')->unsigned();
            $table->integer('nometne_id')->unsigned();
            $table->integer('atbalstitajs_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('nometne_id')->references('id')->on('nometnes');
            $table->foreign('atbalstitajs_id')->references('id')->on('atbalstitajs');
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
        Schema::dropIfExists('dokuments');
    }
}
