<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNometnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nometnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nosaukums');
            $table->datetime('sakums');
            $table->datetime('beigas');
            $table->string('vieta');
            $table->integer('dalib_sk');
            $table->longtext('apraksts');
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
        Schema::dropIfExists('nometnes');
    }
}
