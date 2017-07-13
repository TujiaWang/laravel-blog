<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;

require_once 'resources/org/code/ValidateCode.class.php';

class LoginController extends CommonController
{
    public function login(){
        if($input = Input::all()){
            // dd($input);
            $code = session('code');
            if(strtolower($input['code'])!=$code){
                return back()->with('msg','验证码错误！');
            }
            $user = User::first();
            if($user->user_name != $input['user_name'] || Crypt::decrypt($user->user_pass) != $input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$user]);
            // dd(session('user'));
            // echo 'ok';
            return redirect('admin/index');
        }else{
//             session(['user'=>null]);
            return view('admin.login');
        }
    	
    }
    public function code(){
        $code = new \ValidateCode();
        $code->doimg();
        session(['code' => $code->getCode()]);
    }
    public function logout(){
        session(['user'=>null]);
        return redirect('admin/login');
    }
//     public function crypt(){
//         $str = '123456';
//         $str_p = 'eyJpdiI6ImJCZ21OS2ZSdHNROFBKbmhnV1RVbHc9PSIsInZhbHVlIjoiZFwvZ0Vkc2ZoSkg4OVwvZEVibG1vYlN3PT0iLCJtYWMiOiI2MTNlYWQxYThlNTFiNjJmYTVhNjY0YzQwNjc2ZGI3OGNhYzkxOTFiZmQ5NzA3MjU1N2E0ZTFlZTZiZmM3ZmRhIn0=';
//         echo Crypt::encrypt($str);
//         echo '<br/>';
//         echo Crypt::decrypt($str_p);
//     }
}
