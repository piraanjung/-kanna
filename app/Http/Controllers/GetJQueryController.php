<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use Image;


class GetJQueryController extends Controller
{
    public function getProvince(){

    }

    public function getDistricts($province_code){
        $districts = District::where('province_code', $province_code)->get();
        $str = '<select class="select2 form-control">
                <option>เลือก...</option>
                ';
                foreach($districts as $district){
        $str.=       '<option value="'.$district->amphur_id.'">'.$district->amphur_name.'</option>';        
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
}
