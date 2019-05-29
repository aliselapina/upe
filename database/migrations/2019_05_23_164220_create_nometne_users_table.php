<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNometneUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nometne_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nometne_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();

            $table->foreign('nometne_id')->references('id')->on('nometnes');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('nometne_users');
    }
}
