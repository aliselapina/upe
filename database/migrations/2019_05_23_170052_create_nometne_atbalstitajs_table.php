<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNometneAtbalstitajsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nometne_atbalstitajs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nometne_id')->unsigned()->nullable();
            $table->integer('atbalstitajs_id')->unsigned();

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
        Schema::dropIfExists('nometne_atbalstitajs');
    }
}
