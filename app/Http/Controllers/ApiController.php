<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\utilities\ImageController;
use App\Http\Controllers\GetJQueryController;
use App\Http\Controllers\account_saving\AccountSavingController;
use App\Province;
use App\District;
use App\Tambon;
use App\User;
use App\Profiles;
use App\TransacBankCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class ApiController extends Controller
{
    protected $getJquery;
    protected $image;
    public function __construct(GetJQueryController $getJquery, ImageController $image){
        $this->getJquery = $getJquery;
        $this->image = $image;
    }
    public function getProvince(){
        $provinces =Province::orderBy('province_name' , 'asc')->get();
        return response()->json($provinces);
    }

    public function getDistricts($province_code){
        $districts = District::where('province_code', $province_code)->get();
        return response()->json($districts);
    }

    public function getTambons($district_code){
        $tambons = Tambon::where('amphur_code', $district_code)->get();
        return response()->json($tambons);
    }

    public function checkDuplicateUsername($username){
        $username = User::where('username', $username)->Where('status', 1)->select('username')->first();
        $code = count($username) > 0 ? '204' : '200';
        return response()->json($username);
    }

    public function registerStore(Request $request){
        $code = false;
        $user = new User;
        $user->username = $request->username;;
        $user->passwords = Hash::make($request->password);
        $user->remember_token = 0;
        $user->user_cate_id = 1;
        $user->status= 1;
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        if($user->save()){
            //ทำการบันทึกข้อมูลทั่วไปของ staff ลงใน profiles table
            $new_profile = new Profiles;
            $new_profile->user_id = $user->id;
            $new_profile->name = $request->name;
            $new_profile->lastname = $request->lastname;
            $new_profile->id_card = $request->id_card;
            $new_profile->phone = $request->mobile;
            $new_profile->address = $request->address;
            $new_profile->tambon = $request->tambon_code;
            $new_profile->district = $request->district_code;
            $new_profile->province = $request->province_code;
            $new_profile->simserial_number ='0';
            $new_profile->gender = 1;
            $new_profile->created_at = date('Y-m-d H:i:s');
            $new_profile->updated_at = date('Y-m-d H:i:s');
            if($request->hasFile('file')){
                //ถ้ามี รูปให้ทำการ save รูป และ update image path 
                $new_profile->image = $this->getJquery->uploadImage($request->file, 'trashstaff', $new_staff->id); 
            }
            $new_profile->save();
            $code = true;
        }
        return response()->json($code);
    }

    public function authen(Request $request)
    {
				$username = ($request->has('username')? $request->username : 0);
				$passwords = ($request->has('passwords')? $request->passwords : 0);
				if ($username == '' || $username == '0' || $passwords =='' || $passwords == '0') {
					$result = ['message'=>'ไม่พบผู้ใช้งาน'];
					$code = 204;
				}else {
                    $result = User::where('username', '=', $username)->first();
					$result = $this->verifyhasPassword($passwords, $result);
					$code = 200;
				}
				
				return response()->json($result, $code);
    }

    private function verifyhasPassword($plainPassword, $result)
    {
        $image = new ImageController;
        $account = new AccountSavingController;
        $account_result = $account->findAccountSavingByUserId($result->id);
        $account_saving_id = (!collect($account_result)->isEmpty()? $account_result->id : null);
        if($account_saving_id == null){
            $account->setNewAccountSaving($result->id);
        }
        $hasPassword = (isset($result->passwords)? $result->passwords : 0);
        
        if (!collect($result)->isEmpty() && Hash::check($plainPassword, $hasPassword)) {
						$result['logged'] = true;
						$result['rows'] = 1;
						// $result['image_url'] = $image->getImageUrl($result->image, $this->image_path);
						$result['account_saving_id'] = $account_saving_id;
            $result['remember_token'] = base64_encode(str_random(40));
            $this->updateApiToken($result->id, $result->remember_token);
        } else {
            $result = array();
            $result['rows'] = 0;
            $result['logged'] = false;
        }

        return $result;
    }

    private function updateApiToken($id, $token)
    {
        $result = User::find($id);
        $result->remember_token = $token;
        $result->save();
    }

    public function checkTransBankCode($user_id){
        $trashbankCode = TransacBankCode::where('user_id', $user_id)->first();
        return response()->json($trashbankCode);
    }
    
    public function saveTransactionCode(Request $request){
        $trasCode = new TransacBankCode;
        $trasCode->transac_code = Hash::make($request->transact_code);
        $trasCode->user_id = $request->user_id;
        if($trasCode->save()){
            $code = true;
        }else{
            $code = false;
        }
        return response()->json($code);
    }
}
