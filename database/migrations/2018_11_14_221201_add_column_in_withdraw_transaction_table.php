<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInWithdrawTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_transaction', function (Blueprint $table) {
            $table->datetime('withdraw_date')->after('amount');
            $table->datetime('get_money_date')->after('withdraw_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraw_transaction', function (Blueprint $table) {
            $table->datetime('withdraw_date');
            $table->datetime('get_money_date');
        });
    }
}
