<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberTableSeeder extends Seeder
{
    /**
     *生成member数据表数据
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create("zh_CN");
        $data=[];
        // 循环生成数据
        for ($i=0; $i < 200; $i++) { 
            $data[]=[
                "username"  => $faker->userName,
                "password"  => bcrypt("password"),
                "gender"    => rand(1,3),
                "mobile"    => $faker->phoneNumber,
                "email"     => $faker->email,
                "avatar"    => "/static/1.png",
                "created_at"=> date("Y-m-d H:i:s",time()),
                "type"      =>rand(1,2),
                "status"    => rand(1,2),
            ];
        }
        // 写入数据表
        DB::table("member")->insert($data);
    }
}
