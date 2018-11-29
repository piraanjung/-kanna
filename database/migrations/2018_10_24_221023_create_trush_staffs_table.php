<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrushStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trush_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->text('token');
            $table->integer('user_cat_id');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->dateTime('last_login');
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
        Schema::dropIfExists('trush_staffs');
    }
}
