<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGarbagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garbages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('gb_id')->nullable();
            $table->string('gb_name')->nullable();
            $table->integer('gb_cat_id')->nullable();
            $table->integer('gb_price')->nullable();
            $table->integer('gb_unit_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('garbages');
    }
}
