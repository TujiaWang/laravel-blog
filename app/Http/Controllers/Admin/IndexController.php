<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Validator;

class IndexController extends CommonController
{
    public function index(){
    	return view('admin.index');
    }
    public function top(){
        return view('admin.top');
    }
    public function left(){
        return view('admin.left');
    }
    public function right(){
        return view('admin.right');
    }
    public function pass(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed'
            ];
            $msg = [
                'password.required'=>'新密码不能为空',
                'password.between'=>'新密码必须在6-20位之间',
                'password.confirmed'=>'两次密码输入不一样'
            ];
            $validator = Validator::make($input,$rules,$msg);
            if($validator->passes()){
                $user = User::first();
                $_pwd = Crypt::decrypt($user->user_pass);
                if($input['password_o'] == $_pwd){
                    $user->user_pass = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功');
                }else{
//                     $validator->errors()->add('password_o','原密码错误');
//                     return back()->withErrors($validator);
                    return back()->with('errors','原密码错误');
                }
            }else{
                // dd($validator->errors->all());
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }
    }
}
