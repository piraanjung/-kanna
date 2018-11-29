<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategories extends Model
{
    protected $table = 'item_categories';

    public function items(){
        return $this->hasMany('item_cate_id', 'id');
    }
}
