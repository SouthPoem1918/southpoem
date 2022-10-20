<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建protype专业类表
        Schema::create("protype",function($table){
            $table->increments("id");
            $table->string("protype_name",20)->notNull();//专业名
            $table->tinyInteger("sort")->notNull()->default("0");//专业分类
            $table->timestamps();
            $table->enum("status",[1,2])->notNull()->default("2");//状态

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除数据表
        Schema::dropIfExists("protype");
    }
}
