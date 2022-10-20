<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProtypeProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //创建profession模拟数据
        DB::table("profession")->insert([
            "pro_name"      =>      "php基础班",
            "protype_id"    =>       "1",
            "teachers_ids"   =>       "49,51,53,56",
            "created_at"    =>       date("Y-m-d H:i:s"),
            "duration"      =>        18,
            "conver_img"    =>      "/static/pro_cover.jpg",
            "price"         =>      "100.00",
        ]);
        DB::table("profession")->insert([
            "pro_name"      =>      "php就业班",
            "protype_id"    =>      "1",
            "teachers_ids"   =>     "49,51,53,56",
            "created_at"    =>      date("Y-m-d H:i:s"),
            "duration"      =>      98,
            "conver_img"    =>      "/static/pro_cover.jpg",
            "price"         =>      "198.44",
        ]);
        DB::table("profession")->insert([
            "pro_name"      =>      "前端基础班",
            "protype_id"    =>       "2",
            "teachers_ids"   =>       "88,89,90,91",
            "created_at"    =>       date("Y-m-d H:i:s"),
            "duration"      =>       90,
            "conver_img"    =>      "/static/pro_cover.jpg",
            "price"         =>      "150.00",
        ]);
    }
}