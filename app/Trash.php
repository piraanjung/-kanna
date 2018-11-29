<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $table = 'items';
    
    public function item_categories(){
        return $this->belongsTo('App\ItemCategories','item_cate_id','id');
    }

    public function unit(){
        return $this->belongsTo('App\Unit', 'unit_id', 'id');
    }
}
