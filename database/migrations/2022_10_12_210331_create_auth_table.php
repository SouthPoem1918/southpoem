<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("auth",function(Blueprint $table){
            $table -> increments("id");
            $table -> string("auth_name",20)->notNull();
            $table -> string("controller",40)->nullable();
            $table -> string("action",30)->nullable();
            $table -> tinyInteger("pid");
            $table -> enum("is_nav",[1,2])->notNull()->default("1");//是否作为菜单显示
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists("auth");
    }
}
