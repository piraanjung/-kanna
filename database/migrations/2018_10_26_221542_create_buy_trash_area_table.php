<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyTrashAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_trash_area', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area_name');
            $table->string('province_code',3);
            $table->string('district_code',7);
            $table->string('tambon_code',10)->default('0000000000');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('buy_trash_area');
    }
}
