<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditStatusColumnWithdrawTranscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_transaction', function (Blueprint $table) {
            $table->dropColumn(['status']);
            $table->enum('withdraw_status', ['cancel', 'pending', 'complete'])->after('get_money_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('withdraw_transaction');
    }
}
