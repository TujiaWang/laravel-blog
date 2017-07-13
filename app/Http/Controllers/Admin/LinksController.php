<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Links;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article;
use Validator;

class LinksController extends CommonController
{
    // get 全部友情链接列表
    public function index(){
        $data = Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }
    
    
    // get 添加友情链接
    public function create(){
        return view('admin.links.add');
    }
    
    // post 提交友情链接
    public function store(){
        $input = Input::except('_token');
        // 字段验证规则
        $rules = [
            'link_name'=>'required',
            'link_url' => 'required'
        ];
        // 字段验证不通过的提示信息
        $msg = [
            'link_name.required'=>'连接名称不能为空',
            'link_url.required'=>'连接地址不能为空'
        ];
       
        $validator= Validator::make($input,$rules,$msg);
        if($validator->passes()){
            $res = Links::create($input);
            if($res){
                return redirect('admin/links');
            }else{
                return back()->with('errors','woops！插入出错了');
            }
        }else{
            // dd($validator);
            // 验证没通过返回错误信息
            return back()->withErrors($validator);
        }
    }
    
    // get 显示单个友情链接
    public function show(){
        
    }
    
    // get 删除单个友情链接
    public function destroy($link_id){
        $res = Links::where('link_id',$link_id)->delete();
        if($res){
            $data = ['status'=>0,'msg'=>'连接删除成功！'];
        }else{
            $data = ['status'=>1,'msg'=>'连接删除失败！'];
        }
        return $data;
    }
    
    // get 编辑友情链接
    public function edit($link_id){
        $field = Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }
    
    // get 更新友情链接
    public function update($link_id){
        $input = Input::except('_token','_method');
        $res = Links::where('link_id',$link_id)->update($input);
        if($res){
            return redirect('admin/links');
        }else{
            return back()->with('errors','woops！更新出错了');
        }
    }
    
    public function changeOrder(){
        $input = Input::all();
        $link = Links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $re = $link->update();
        if($re){
            $data = ['status' => 0,'msg' => '更新成功！'];
        }else{
            $data = ['status' => 1,'msg' => '更新失败，请重试'];
        }
        return $data;
    }
}
