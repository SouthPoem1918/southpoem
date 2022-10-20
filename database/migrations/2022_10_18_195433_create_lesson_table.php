<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建lesson
        Schema::create("lesson",function($table){
            $table->increments("id");
            $table->string("lesson_name",50)->notNull();
            $table->integer("course_id")->notNull();
            $table->integer("video_time");
            $table->string("video_addr");
            $table->integer("sort")->notNull()->default(0);
            $table->string("description");
            $table->timestamps();//创建、修改数据时间
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
        //删除lesson表
        Schema::dropIfExists("lesson");
    }
}
