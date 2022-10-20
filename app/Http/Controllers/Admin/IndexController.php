<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //首页展示
    public function index(){
        return view("admin/index/index");
    }
    //
    public function welcome(){
        return view("admin/index/welcome");
    }

    public function logout(){
        Auth::guard("admin")->logout();
        return view("admin/public/login");
    }
}
