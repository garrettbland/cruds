<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudsTable extends Migration
{

    public function up()
    {
        Schema::create('cruds', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('color');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cruds');
    }
}
