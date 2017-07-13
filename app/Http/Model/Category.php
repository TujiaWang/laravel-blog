<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    public $timestamps = false;
    protected $guarded = [];
    
    public function tree(){
        return $this->getTree($this->orderBy('cat_order','asc')->get(),'cat_id','cat_pid','cat_name');
    }
    
    /* 
    public static function tree(){
        return (new Category())->getTree(Category::all(),'cat_id','cat_pid','cat_name');
    }
    */
    
    public function getTree($data,$field_id='id',$field_pid='pid',$field_name,$pid=0){
        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_pid == $pid){
                $data[$k]['_'.$field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach($data as $m=>$n){
                    if($n->$field_pid == $v->$field_id){
                        $data[$m]['_'.$field_name] = '┃┄┄┄ '.$data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
