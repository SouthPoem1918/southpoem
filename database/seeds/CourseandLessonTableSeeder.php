<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseandLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 添加course表数据
        DB::table("course")->insert([
            "course_name"      =>      "linux",
            "profession_id"    =>       "2",
            "cover_img"       =>      "/static/course_lesson.png",
            "created_at"       =>       date("Y-m-d H:i:s"),
        ]);
        DB::table("course")->insert([
            "course_name"      =>      "jQuery",
            "profession_id"    =>       "2",
            "cover_img"       =>      "/static/course_lesson.png",
            "created_at"       =>       date("Y-m-d H:i:s"),
        ]);
        DB::table("course")->insert([
            "course_name"      =>      "ThinkPHP",
            "profession_id"    =>       "2",
            "cover_img"       =>      "/static/course_lesson.png",
            "created_at"       =>       date("Y-m-d H:i:s"),
        ]);
        DB::table("course")->insert([
            "course_name"      =>      "laravel",
            "profession_id"    =>       "2",
            "cover_img"       =>      "/static/course_lesson.png",
            "created_at"       =>       date("Y-m-d H:i:s"),
        ]);

        // 创建lesson表数据
        DB::table("lesson")->insert([
            "lesson_name"      =>      "linux发展史",
            "course_id"        =>       "1",
            "video_addr"       =>      "/static/lesson.mp4",
            "created_at"       =>       date("Y-m-d H:i:s"),
            "video_time"       =>       86400,
        ]);
        DB::table("lesson")->insert([
            "lesson_name"      =>      "jQuery编程",
            "course_id"        =>       "1",
            "video_addr"       =>      "/static/lesson.mp4",
            "created_at"       =>       date("Y-m-d H:i:s"),
            "video_time"       =>       86400,
        ]);
        DB::table("lesson")->insert([
            "lesson_name"      =>      "虚拟机安装",
            "course_id"        =>       "2",
            "video_addr"       =>      "/static/lesson.mp4",
            "created_at"       =>       date("Y-m-d H:i:s"),
            "video_time"       =>       86400,
        ]);
        DB::table("lesson")->insert([
            "lesson_name"      =>      "九大选择器",
            "course_id"        =>       "2",
            "video_addr"       =>      "/static/lesson.mp4",
            "created_at"       =>       date("Y-m-d H:i:s"),
            "video_time"       =>       86400,
        ]);
    }
}
