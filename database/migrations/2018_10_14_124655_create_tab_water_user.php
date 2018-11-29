<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabWaterUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_water_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('twu_code');
            $table->integer('user_id');
            $table->float('price_per_unit', 8, 2);
            $table->string('twu_status');
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
        Schema::dropIfExists('tab_water_user');

    }
}
