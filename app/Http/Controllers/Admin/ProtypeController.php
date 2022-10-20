<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Protype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProtypeController extends Controller
{
    //专业分类页面
    public function index(){
        $data=Protype::orderBy("sort","desc")->get();

        return view("admin.protype.index",compact("data"));
    }
}
