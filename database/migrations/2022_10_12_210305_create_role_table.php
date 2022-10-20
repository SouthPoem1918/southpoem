<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建角色表
        Schema::create("role",function(Blueprint $table){
            $table->increments("id");
            $table->string("role_name",20)->notNull();
            $table->text("auth_ids");
            $table->text("auth_ac");//权限控制器和方法组合字符串
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //删除role表
        Schema::dropIfExists("role");
    }
}
