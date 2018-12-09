<?php

namespace App\Http\Controllers\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BuyTrashPoint;
use Illuminate\Support\Facades\DB;

class BuyTrashPointController extends Controller
{
    public function index(){
        $buy_trash_point = BuyTrashPoint::where(['status' => 'active'])->get();
        return view('settings-buy-trash-point/index',[
            'buy_trash_point' => $buy_trash_point
        ]);
    }

    public function create(){
        $buy_trash_area = DB::table('buy_trash_area')->select('area_name', 'id')->get();
        return view('settings-buy-trash-point/create',[
            'buy_trash_area' => $buy_trash_area
        ]);
    }

    public function store(Request $request){ 
        $buy_trash_point = DB::table('buy_trash_point')->insert([
            "point_name" => $request->point_name,
            "area_id" => $request->setting_buy_trash_area,
            "status" => $request->setting_status,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect('settings-buy-trash-point/index');
    }

    public function edit($id){
        $buy_trash_point = DB::table('buy_trash_point')->where('id', $id)->first();
        $buy_trash_area = DB::table('buy_trash_area')->select('id', 'area_name')->get();
        return view('settings-buy-trash-point/edit',[
            'buy_trash_point' => $buy_trash_point,
            'buy_trash_area' => $buy_trash_area
        ]);
    }


    public function update(Request $request){
        DB::table('buy_trash_point')->where('id', $request->buy_trash_point_id)
            ->update([
                "point_name" => $request->point_name,
                "area_id" => $request->setting_buy_trash_area,
                "status" => $request->setting_status,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        return redirect('settings-buy-trash-point/index');
    }

    public function delete($id){
        DB::table('buy_trash_point')->where('id', $id)
            ->update([
                'status' => 'inactive',
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        return redirect('settings-buy-trash-point/index');

    }

}