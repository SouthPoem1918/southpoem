<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    //定义模型初始属性
    protected $table ="profession";
    // 关联模型protype
    public function link_protype(){
        
        return $this->hasOne("App\Admin\Protype","id","protype_id");
    }

}
