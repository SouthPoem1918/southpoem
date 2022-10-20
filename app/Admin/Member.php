<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //定义关联数据表
    protected $table="member";
    // 禁用时间
    // public $timestamps=false;

/*     // 统计member表内数据条数
    public function total_nmu(){
        $total=$this->count();
        return $total;
    } */
}
