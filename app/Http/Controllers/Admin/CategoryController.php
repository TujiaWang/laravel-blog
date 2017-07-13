<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Validator;

class CategoryController extends CommonController
{
    // get 全部分类信息列表
    public function index(){
        // $data = Category::tree();
        $data = (new Category())->tree();
        return view('admin.category.index')->with('data',$data);
    }
    
    
    // get 添加分类
    public function create(){
        $data = Category::where('cat_pid',0)->get();
        return view('admin.category.add',compact('data'));
    }
    
    // post 提交分类
    public function store(){
        // 获取数据并排除token，其余数据直接添加到数据库
        $input = Input::except('_token');
        // 字段验证规则
        $rules = [
            'cat_name'=>'required'
        ];
        // 字段验证不通过的提示信息
        $msg = [
            'cat_name.required'=>'分类名称不能为空',
        ];

        $validator= Validator::make($input,$rules,$msg);
        if($validator->passes()){
            $res = Category::create($input);
            if($res){
                return redirect('admin/category');
            }else{
                return back()->with('errors','woops！插入出错了');
            }
        }else{
            // dd($validator);
            // 验证没通过返回错误信息
            return back()->withErrors($validator);
        }
    }
    
    // get 显示单个分类
    public function show(){
        
    }
    
    // get 删除单个分类
    public function destroy($cat_id){
        $res = Category::where('cat_id',$cat_id)->delete($cat_id);
        Category::where('cat_pid',$cat_id)->update(['cat_pid'=>0]);
        if($res){
            $data = ['status'=>0,'msg'=>'分类删除成功！'];
        }else{
            $data = ['status'=>1,'msg'=>'分类删除失败！'];
        }
        return $data;
    }
    
    // get 编辑分类
    public function edit($cat_id){
        $field = Category::find($cat_id);
        $data = Category::where('cat_pid',0)->get();
        return view('admin.category.edit',compact('field','data'));
        // dd($field);
    }
    
    // get 更新分类
    public function update($cat_id){
        $input = Input::except('_token','_method');
        $res = Category::where('cat_id',$cat_id)->update($input);
        if($res){
            return redirect('admin/category');
        }else{
            return back()->with('errors','woops！更新出错了');
        }
    }
    
    public function changeOrder(){
        $input = Input::all();
        $cat = Category::find($input['cat_id']);
        $cat->cat_order = $input['cat_order'];
        $re = $cat->update();
        if($re){
            $data = ['status' => 0,'msg' => '更新成功！'];
        }else{
            $data = ['status' => 1,'msg' => '更新失败，请重试'];
        }
        return $data;
    }
}
