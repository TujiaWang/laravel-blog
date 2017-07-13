<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    // 图片上传
    public function upload(){
        $file = Input::file('Filedata');
        if($file->isValid()){ // 判断文件是否有效
            $extension = $file->getClientOriginalExtension(); // 上传文件的后缀名
            $newName = date('YmdHis').mt_rand(100,999).'.'.$extension;
            $path = $file->move(base_path().'/uploads',$newName);
            $newPath = 'uploads/'.$newName;
            return $newPath;
        }
    }
}
