<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建member数据表
        Schema::create("member",function(Blueprint $table){
            $table->increments("id");
            $table->string("username",20)->notNull();
            $table->string("password")->notNull();
            $table->enum("gender",[1,2,3])->notNull()->default("1");
            $table->string("mobile",11);
            $table->string("email",40);
            $table->string("avatar");//头像
            $table->timestamps();//创建、修改数据时间
            $table->rememberToken();//记住登录标记
            $table->enum("type",[1,2])->notNull()->default("1");
            $table->enum("status",[1,2])->notNull()->default("2");
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
        Schema::dropIfExists("menber");
    }
}
