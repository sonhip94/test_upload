<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('extension');
            $table->date('createDate');
            $table->date('uploadDate');
			$table->string('size');
			$table->rememberToken();
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
        Schema::dropIfExists('files');
    }
}
