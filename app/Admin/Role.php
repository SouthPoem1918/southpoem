<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Auth;
class Role extends Model
{
    //定义关联数据表
    protected $table="role";
    // 禁用时间
    public $timestamps=false;

    // 处理权限分派
    public function assignAuth($data){
        // 获取auth_ids的值
        $post["auth_ids"]=implode(",",$data["auth_id"]);
        // 获取auth_ac
        $temp=Auth::where("pid","!=",0) -> where("id",$data["auth_id"])-> get();
        $ac="";
        foreach($temp as $key =>$value){
            $ac = $ac.$value->cntroller. "@" .$value->action.",";
        }
        $post["auth_ac"]=rtrim($ac,",");
        dd($post);

        return Role::where("id",$data["id"])->update();
    }
}