<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Admin\Role;
use Illuminate\Support\Facades\Input;


class RoleController extends Controller
{
    // 角色列表展示
    public function index(){
        $data=Role::get();
        return view("/admin/role/index",compact("data"));
    }

    // 权限分派
    public function assign(){
        // 判断请求类型
        if(Input::method() == "POST"){
            $data=Input::only(["id","auth_id"]);
            $role=new Role();
            $result=$role->assignAuth($data);
            return $data;
        }
        else{
            $top=Auth::where("pid",0)->get();
            $cat=Auth::where("pid","!=",0)->get();
            return view("/admin/role/assign",compact("top","cat"));
        }

    }

    public function add(){
        // $data=Role::get();
        return view("/admin/role/add");
    }

}