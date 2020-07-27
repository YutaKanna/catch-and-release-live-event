<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicianGroupMusicianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musician_group_musician', function (Blueprint $table) {
            $table->integer('musician_group_id')->unsigned();
            $table->foreign('musician_group_id')->references('id')->on('musician_groups');
            $table->integer('musician_id')->unsigned();
            $table->foreign('musician_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musician_group_musician');
    }
}
