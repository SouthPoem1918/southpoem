<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Input;
use App\Admin\Auth;
use Illuminate\Support\Facades\DB;
// use Input;

class AuthController extends Controller
{
    //权限列表
    public function index(){
    //联表 
        $data=DB::table("auth as t1") ->select("t1.*","t2.auth_name as parent_name")
        ->leftJoin("auth as t2","t1.pid","=","t2.id")-> get();
        // dd($data);
        return view("admin.auth.index",compact("data"));
    }

    // 添加用户权限
    public function add(){
        if(Input::method()=="POST"){
            $data=Input::except("_token");
            $res=Auth::insert($data);
            // 添加成功返回true,但是框架自身不能返回Boolean值
            // dd($res);
            return $res ? "1":"0";
            // if($res=="true"){
            //     return 1;
            // }
            // else{
            //     return 0;
            // }
        }
        else{
            // 查询父级权限
            $parents=Auth::where("pid","=",0)->get();
            return view("admin.auth.add",compact("parents"));
        }
    }
}
