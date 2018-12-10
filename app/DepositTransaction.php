<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositTransaction extends Model
{
    protected $table = 'deposit_transaction';

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function purchase_items(){
        return $this->belongsTo('App\PurchaseItems', 'purchase_item_id');
    }
}
