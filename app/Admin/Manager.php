<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;


// 引入Illuminate\Auth下的trait，该处的Authenticatable有方法体
use Illuminate\Auth\Authenticatable;

// 此处继承的接口\Illuminate\Contracts\Auth\Authenticatable没有方法体
class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前模型关联的数据表
    protected $table="manager";

    // 使用trait,把Illuminate\Auth下的代码复制至此
    // php5.4后的特性，提高代码复用性
    use Authenticatable;

    // 关联角色模型 (1:1)
    public function role(){
        return $this->hasOne("App\Admin\Role","id","role_id");
    }
}
