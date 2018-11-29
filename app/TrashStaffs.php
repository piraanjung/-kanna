<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\StaffOperateSchedule;

class TrashStaffs extends Model
{
    protected $table = 'trash_staffs';

    public function profile()
    {
        return $this->hasOne('App\Profiles', 'user_id');
    }

    public function staff_operation_schedule(){
        return $this->hasMany('App\StaffOperateSchedule', 'staff_id', 'id');
    }

    public function find_operate_date_time($id){
        $operateDate =StaffOperateSchedule::where('status', 'sending')
        ->where('staff_id', $id)
        ->get();
        return $operateDate;
    }

}
