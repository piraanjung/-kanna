<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffOperationScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_operation_schedule', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area_id');
            $table->integer('point_id');
            $table->date('operation_date');
            $table->time('operation_time');
            $table->enum('status',['cancel','sending', 'accepted', 'operating','complete']);
            $table->text('comment');
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
        Schema::dropIfExists('staff_operation_schedule');
    }
}
