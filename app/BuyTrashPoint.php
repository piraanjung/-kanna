<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyTrashPoint extends Model
{
    protected $table = 'buy_trash_point';

   public function buy_trash_area(){
        return $this->belongsTo('App\BuyTrashArea', 'id');
   }


}
