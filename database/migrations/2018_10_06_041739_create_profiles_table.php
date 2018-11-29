<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('id_card')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('tambon')->nullable();
            $table->integer('district')->nullable();
            $table->integer('province')->nullable();
            $table->string('gender');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profiles');
    }
}
