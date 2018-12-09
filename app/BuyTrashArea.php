<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyTrashArea extends Model
{
    protected $table = 'buy_trash_area';

    public function province(){
        return $this->belongsTo('App\Province', 'province_code', 'province_code');
    }

    public function district()
    {
        return $this->belongsTo('App\District','district_code', 'amphur_code');
    }

    public function tambon()
    {
        return $this->belongsTo('App\Tambon','tambon_code', 'tambon_code');
    }
}
