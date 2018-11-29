<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffOperateSchedule extends Model
{
    protected $table = 'staff_operation_schedule';

    public function user()
    {
        return $this->belongsTo('App\User', 'staff_id');
    }

    public function buy_trash_point()
    {
        return $this->belongsTo('App\BuyTrashPoint', 'point_id');
    }

    public function buy_trash_area()
    {
        return $this->belongsTo('App\BuyTrashArea', 'area_id');
    }
}
