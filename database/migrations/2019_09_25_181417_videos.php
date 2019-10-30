<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Videos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
  {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('duration');
            $table->integer('extension');
            $table->date('createDate');
            $table->date('uploadDate');
            $table->integer('jwPlayerId');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('User')->onDelete('cascade');
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
        Schema::drop('videos');
    }
}
