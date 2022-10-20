<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    // 会员列表展示
    public function index(){
        $data=Member::get();
        return view("admin.member.index",compact("data"));
    }
    // 会员添加
    public function add(){
        if(Input::method()=="POST"){
            // 自动验证
            $result=Member::insert([
                "username"  =>  Input::get("username"),
                "password"  =>  bcrypt("password"),
                "avatar"    =>  Input::get("avatar"),
                "gender"    =>  Input::get("gender"),
                "type"      =>  Input::get("type"),
                "status"    =>  Input::get("status"),
                "province_id"   =>  Input::get("province_id"),
                "city_id"   =>  Input::get("city_id"),
                "county_id" =>  Input::get("county_id"),
                "mobile"    =>  Input::get("mobile"),
                "email"     =>  Input::get("email"),
                "created_at" => date("Y-m-d H:i:s"),
            ]);
            return $result ? "用户添加成功！":"用户添加失败！";
        }
        else{
            $province=DB::table("sys_area")->where("type","=","1")->get();
            return view("/admin/member/add",compact("province"));
        }
    }

    // ajax三级联动
    public function getAreaById(){
        $id=Input::get("id");
        // 获取当前id和父级parent_id相等
        $data=DB::table("sys_area")->where("parent_id","=",$id)->get();
        $result=response()->json($data);
        return $result;
    }

    // 会员信息显示
    public function show(){
        $member_msg=Member::where("id","=","$(this.id)")->get();
        return view("admin.member.show",compact("member_msg"));
    }
}
