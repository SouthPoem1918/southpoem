<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProfessionController extends Controller
{
    //专业列表页面
    public function index(){
        // 获取profession表数据
        $data=Profession::orderBy("sort","desc")->get();

        return view("admin.profession.index",compact("data"));
    }
}
