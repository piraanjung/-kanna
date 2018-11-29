<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tambon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tambon_code');
            $table->string('tambon_name');
            $table->string('amphur_code');
            $table->string('zipcode');
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
        Schema::dropIfExists('tambon');
    }
}
