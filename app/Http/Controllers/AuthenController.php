<?php

namespace App\Http\Controllers;

use App\Http\Controllers\utilities\ImageController;
use App\User;
use App\Http\Controllers\account_saving\AccountSavingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;
// use Laravel\Lumen\Routing\Controller as BaseController;

class AuthenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $image;
    public function __construct(ImageController $image)
    {
        $this->image = $image;
    }

    private $image_path = 'user_images/';

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
    
    public function authen_by_password_and_phone(Request $request)
    {
				$phonenumber = ($request->has('phonenumber')? $request->phonenumber : 0);
				$password = ($request->has('password')? $request->password : 0);
				if ($phonenumber == '' || $phonenumber == '0' || $password =='' || $password == '0') {
					$result = ['message'=>'ไม่พบผู้ใช้งาน'];
					$code = 204;
				}else {
					$result = User::where('mobile', '=', $phonenumber)->first();
					$result = $this->verifyhasPassword($password, $result);
					$code = 200;
				}$result = ['message'=>'ไม่พบผู้ใช้งาน'];
				
				return response()->json($request, $code);
    }

    private function verifyhasPassword($plainPassword, $result)
    {
				$image = new ImageController;
				$account = new AccountSavingController;
				$account_result = $account->findAccountSavingByUserId($result->id);
				$account_saving_id = (!collect($account_result)->isEmpty()? $account_result->id : null);
				$hasPassword = (isset($result->passwords)? $result->passwords : 0);

        if (!collect($result)->isEmpty() && Hash::check($plainPassword, $hasPassword)) {
						$result['logged'] = true;
						$result['rows'] = 1;
						$result['image_url'] = $image->getImageUrl($result->image, $this->image_path);
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
}
