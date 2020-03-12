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
            'user_id'=>3,
            'location_id'=>1,
        ]);
        DB::table('store')->insert([
            'name' => "TrungShop",
            'description'=>"Điện thoại giá rẻ uy tín",
            'user_id'=>4,
            'location_id'=>5,
        ]);
    }
}
