<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Province;
use App\District;
use App\Tambon;
use App\Bottles;
use App\sellBottlesInSchool;
use App\User;
use App\AccountSaving;
use Image;


class GetJQueryController extends Controller
{
    public function getDistricts($province_code){
        $districts = District::where('province_code', $province_code)->get();
        $str = '<select class="select2 form-control">
                <option>เลือก...</option>
                ';
                foreach($districts as $district){
        $str.=       '<option value="'.$district->amphur_code.'">'.$district->amphur_name.'</option>';        
                }
        $str.= '</select>';

        return $str;
    }

    public function getTambons($amphur_code){
        $tambons = Tambon::where('amphur_code', $amphur_code)->get();
        $str = '<select class="select2 form-control">
                <option>เลือก...</option>
                ';
                foreach($tambons as $tambon){
        $str.=       '<option value="'.$tambon->tambon_code.'">'.$tambon->tambon_name.'</option>';        
                }
        $str.= '</select>';

        return $str;
    }


    public function uploadImage($file, $imge_cat_name,$id){
        //resize image
        $imgwidth = 300;
        //folder upload (public/imgpics)
        $folderupload = 'images';
        $type = explode('.',$file->getClientOriginalName());

        $filename = time() ."_".$imge_cat_name."_".$id.".".$type[1]; // prepend the time (integer) to the original file name
        $path = public_path($folderupload.'/' . $filename);

        // create instance of Intervention Image
        $img = Image::make($file->getRealPath());

        if($img->width()>$imgwidth){
            // resize the image to a width of 300 and constrain aspect ratio (auto height)
            $img->resize($imgwidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $img->save($path);
        return $filename;
        
    }

    public function check_bottle_barcode($barcode){
        $result = Bottles::where(['barcode' =>$barcode])
        ->leftJoin('items', 'items.id', '=', 'bottles.items_id')
        ->leftJoin('units', 'items.unit_id', 'units.id')
        ->get(['items.*', 'bottles.*', 'units.un_name']);
        return response()->json($result, 200);
    }

    public function store_bottles(Request $request){
        $saveBottle = new sellBottlesInSchool;
        $saveBottle->user_id = 1;//$request->user_id;
        $saveBottle->bottle_id = $request->id;
        $saveBottle->bottle_num = 1;
        $saveBottle->price = 0.17;
        $saveBottle->sum_price = $saveBottle->bottle_num * $saveBottle->price;
        $saveBottle->created_at = date('Y-m-d H:i:s');	
        $saveBottle->withdraw_id = 0;
        $saveBottle->updated_at = date('Y-m-d H:i:s');	


        if($saveBottle->save()){
            // $arr = ['success' => 'ok'];
            return response()->json($request, 200);
        }
    }

    public function getUser($id){
        $user  = User::where('id', $id)->get();

    }

    public function get_account_balance(Request $request){
        $account_balance = AccountSaving::where('user_id', $request->user_id)
            ->leftJoin('users', 'users.id', '=', 'acc_saving.user_id')
            ->get(['acc_saving.*', 'users.id_card']);
        return $account_balance;
    }

}
