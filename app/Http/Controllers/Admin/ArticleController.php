<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Article;
use Validator;

class ArticleController extends CommonController
{
    // get 全部文章信息列表
    public function index(){
        $data = Article::orderBy('art_id','desc')->paginate(3);
        return view('admin.article.index',compact('data'));
    }
    
    
    // get 添加文章
    public function create(){
        $data = (new Category())->tree();
        return view('admin.article.add',compact('data'));
    }
    
    // post 提交文章
    public function store(){
        $input = Input::except('_token');
        $input['art_time'] = time();
        // 字段验证规则
        $rules = [
            'art_title'=>'required',
            'art_content' => 'required'
        ];
        // 字段验证不通过的提示信息
        $msg = [
            'art_title.required'=>'文章标题不能为空',
            'art_content.required'=>'文章内容不能为空'
        ];
       
        $validator= Validator::make($input,$rules,$msg);
        if($validator->passes()){
            $res = Article::create($input);
            if($res){
                return redirect('admin/article');
            }else{
                return back()->with('errors','woops！插入出错了');
            }
        }else{
            // dd($validator);
            // 验证没通过返回错误信息
            return back()->withErrors($validator);
        }
    }
    
    // get 显示单个文章
    public function show(){
        
    }
    
    // get 删除单个文章
    public function destroy($art_id){
        $res = Article::where('art_id',$art_id)->delete();
        if($res){
            $data = ['status'=>0,'msg'=>'文章删除成功！'];
        }else{
            $data = ['status'=>1,'msg'=>'文章删除失败！'];
        }
        return $data;
    }
    
    // get 编辑文章
    public function edit($art_id){
        $data = (new Category())->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }
    
    // get 更新文章
    public function update($art_id){
        $input = Input::except('_token','_method');
        $res = Article::where('art_id',$art_id)->update($input);
        if($res){
            return redirect('admin/article');
        }else{
            return back()->with('errors','woops！更新出错了');
        }
    }
}
