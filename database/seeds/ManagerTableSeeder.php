<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //模拟生成100条不同数据  faker代码依赖
        $faker = Faker\Factory::create("zh_CN");
        $data=[];
        // 循环生成数据
        for ($i=0; $i < 100; $i++) { 
            $data[]=[
                "username"  => $faker->userName,
                "password"  => bcrypt("123456"),
                "gender"    => rand(1,3),
                "mobile"    => $faker->phoneNumber,
                "email"     => $faker->email,
                "role_id"   => rand(1,6),
                "created_at"=> date("Y-m-d H:i:s",time()),
                "status"    => rand(1,2),
            ];
        }
        // 写入数据表
        DB::table("manager")->insert($data);
    }
}
