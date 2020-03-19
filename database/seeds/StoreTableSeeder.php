<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store')->insert([
            'name' => "HangShop",
            'description'=>"Chuyên kinh doanh quần áo giá rẻ",
            "approval"=>"1",
            "notification"=>1,
            'user_id'=>3,
            'location_id'=>1,
        ]);
        DB::table('store')->insert([
            'name' => "TrungShop",
            'description'=>"Điện thoại giá rẻ uy tín",
            "approval"=>"1",
            "notification"=>1,
            'user_id'=>4,
            'location_id'=>5,
        ]);
        DB::table('store')->insert([
            'name' => "BabyShop",
            'description'=>"Shop đồ chơi cho bé",
            "approval"=>"1",
            "notification"=>1,
            "blocked"=>1,
            'user_id'=>6,
            'location_id'=>4,
        ]);
        DB::table('store')->insert([
            'name' => "BacGiangFood",
            'description'=>"Món ngon hương vị bắc giang",
            "approval"=>"0",
            "notification"=>1,
            'user_id'=>7,
            'location_id'=>6,
        ]);
    }
}
