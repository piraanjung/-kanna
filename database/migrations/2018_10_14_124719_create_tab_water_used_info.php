<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabWaterUsedInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_water_used_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('twu_id');
            $table->string('bill_no');
            $table->integer('month');
            $table->integer('year');
            $table->float('before_record',4,2);
            $table->float('current_record',4,2);
            $table->float('used_unit',4,2);
            $table->float('sum_paid',5,2);
            $table->integer('recorder_id');
            $table->integer('chashier_id');
            $table->string('paid_status');
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
        Schema::dropIfExists('tab_water_used_info');

    }
}
