<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawTranction extends Model
{
    protected $table = 'withdraw_transaction';
    protected $fillable = [
        'user_id',
        'id_card',
        'amount',
        'withdraw_date',
        'get_money_date'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    

}
