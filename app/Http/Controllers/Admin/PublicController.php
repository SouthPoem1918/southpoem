<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //后台登录页面
    public function login(){
        return view("admin.public.login");
    }

    // 验证用户信息
    public function check(Request $request){
        
        $this->validate($request,[
            // 输入信息的规则
            "username"=>"required|min:2|max:20",
            "password"=>"required|min:6",
            // "captcha" =>"required|captcha",
        ]);
        $data=$request->only(["username","password"]);
        $data["status"]="2";
        $result=Auth::guard("admin")->attempt($data,$request->get("online"));
        // dd($result);
        if($result){
            return redirect("/admin/index/index");
        }
        else{
            return redirect("/admin/public/login")->withErrors([
                "loginerror"=>"用户名或密码错误！",
            ]);
        }
    }

    

}
