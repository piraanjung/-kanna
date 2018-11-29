<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrashStaffs; 
use App\Profiles;
use App\Province;
use App\Http\Controllers\GetJQueryController;

class TrashStaffController extends Controller
{
    protected $getJquery;
    public function __construct(GetJQueryController $getJquery){
        $this->getJquery = $getJquery;
    }
    public function index(){
        $staffs = TrashStaffs::where('status', 'active')->get();
        return view('trash_staff.index', compact('staffs'));
    }

    public function create(){
        // $categories = TrashStaffs::where('status', )->get(['id', 'name']);
        $provinces = Province::all();
        $profile  = new Profiles;
        return view('trash_staff.create', compact('profile', 'provinces'));
    }

    public function store(Request $request){
        //save new staff ลง trash_staffs table
        $new_staff = new TrashStaffs;
        $new_staff->username = $request->username;;
        $new_staff->password = md5($request->password);
        $new_staff->token = 0;
        $new_staff->user_cat_id = 3;
        $new_staff->status= 'active';
        $new_staff->created_at = date('Y-m-d H:i:s');
        $new_staff->updated_at = date('Y-m-d H:i:s');
        if($new_staff->save()){
            if($request->hasFile('file')){
                //ถ้ามี รูปให้ทำการ save รูป และ update image path 
                //ทำการบันทึกข้อมูลทั่วไปของ staff ลงใน profiles table
                $new_profile = new Profiles;
                $new_profile->user_id = $new_staff->id;
                $new_profile->name = $request->name;
                $new_profile->lastname = $request->lastname;
                $new_profile->id_card = $request->id_card;
                $new_profile->phone = $request->phone;
                $new_profile->address = $request->address;
                $new_profile->tambon = $request->tambon;
                $new_profile->district = $request->district;
                $new_profile->province = $request->province;
                $new_profile->gender = $request->gender;
                $new_profile->image = $this->getJquery->uploadImage($request->file, 'trashstaff', $new_staff->id);
                $new_profile->created_at = date('Y-m-d H:i:s');
                $new_profile->updated_at = date('Y-m-d H:i:s');
                $new_profile->save();
            }
            $message = 'ทำการบันทึกข้อมูลเรียบร้อยแล้ว';
        }else{
            $message = 'ไม่สารมาถทำการบันทึกข้อมูลได้';
        }

        return redirect('trash_staff/index')->with('message', $message);
    }

    public function get_districts(Request $request){
        return  $this->getJquery->getDistricts($request->province_code);
    }

    public function get_tambons(Request $request){
        return  $this->getJquery->getTambons($request->amphur_code);
    }
}
