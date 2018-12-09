<?php

namespace App\Http\Controllers\settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\BuyTrashArea;
use App\Province;
use App\Tambon;

class BuyTrashAreaController extends Controller
{
    public function index(){
        $buy_trash_area = BuyTrashArea::where(['status' => 'active'])->get();
        return view('settings/buy_trash_area/index',compact('buy_trash_area'));
    }

    public function create(){
        $buy_trash_area = new BuyTrashArea;
        $provinces = DB::table('province')->select('province_name', 'province_code')->get();
        return view('settings.buy_trash_area.create', compact('buy_trash_area', 'provinces'));
    }

    public function store(Request $request){
        $buy_trash_area = DB::table('buy_trash_area')->insert([
            "area_name" => $request->area_name,
            "province_code" => $request->setting_province_id,
            "district_code" => $request->setting_amphur_id,
            "tambon_code" => $request->tambon_id,
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s')
        ]);
        return redirect('settings/buy_trash_area/index')->with('message', 'ok');
    }

    public function edit($id){
        $buy_trash_area = DB::table('buy_trash_area')->where('id', $id)->first();
        $provinces = DB::table('province')->select('province_name', 'province_code')->get();
        return view('settings-buy-trash-area/edit',[
            'buy_trash_area' => $buy_trash_area,
            'provinces' => $provinces
        ]);
    }

    public function update($id, Request $request){
        DB::table('buy_trash_area')->where('id', $request->buy_trash_area_id)
            ->update([
                "area_name" => $request->area_name,
                "province_code" => $request->setting_province_id,
                "district_code" => $request->setting_amphur_id,
                "tambon_code" => $request->tambon_id,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        return redirect('settings-buy-trash-area/index');
    }

    public function delete($id){
        DB::table('buy_trash_area')->where('id', $id)
            ->update([
                'status' => 'inactive',
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        return redirect('settings-buy-trash-area/index');

    }

    public function get_tambon(Request $request){
        $tambons = DB::table('tambon')->select('tambon_name', 'tambon_code')->where('amphur_code','=',$request->amphur)->get();
        $str = "<option> เลือก..</option>";
        foreach($tambons as $tambon){
            $str.= '<option value="'.$tambon->tambon_code.'">'.$tambon->tambon_name.'</option>';
        }
        return response()->json($str);
    }
}
