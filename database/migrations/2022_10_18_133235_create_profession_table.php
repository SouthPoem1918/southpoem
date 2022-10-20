<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建profession表
        Schema::create("profession",function($table){
            $table->increments("id")->notNull();
            $table->string("pro_name",20)->notNull();//专业名称
            $table->tinyInteger("protype_id")->notNull();//专业分类主键
            $table->string("teachers_ids")->notNull();//教师
            $table->string("description");//专业描述
            $table->string("conver_img")->notNull();//图片地址
            $table->string("view_count")->notNull()->default("500");//点击量
            $table->timestamps();
            $table->tinyInteger("sort")->notNull()->default("0");//专业分类
            $table->tinyInteger("duration");//课时，单位：小时
            $table->decimal("price",7,2);//精确到小数点后两位
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除profession表
        Schema::dropIfExists("profession");
    }
}
