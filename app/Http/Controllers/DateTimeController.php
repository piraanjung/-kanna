<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateTimeController extends Controller
{
    public function _date_format($date){
        $date_arr = explode('/',$date);
        // $date_arr ที่ได้ จะเป็น 0->เดือน 1->วัน 2->ปี ->  จัดให้อยู่รูป Y-m-d(2-0-1)
        return $date_arr[2]."-".$date_arr[0]."-".$date_arr[1];
    }

    public function reverse_date_format($date){
        $exp_date_and_time = explode(" ", $date);
        $date = $exp_date_and_time[0];
        $dateArr = explode('-', $date);
        //$dateArr ที่ได้ 0->ปี 1=เดือน 2->วัน แปลงเป็น เดือน/วัน/ ปี
        return  $dateArr[1]."/".$dateArr[2]."/".$dateArr[0];
    }

    public function time_format($time){
        $timeArr = explode(" ", $time);
        return $timeArr[0];
    }
}
