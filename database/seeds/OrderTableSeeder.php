<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'store_id' => 1,
            'user_id'=>2,
            'shipping_address'=>"So 18 Phuong Tan thinh Thai nguyen",
            'shipping_phone'=>"0914949671",
            'isNotification'=>0,
            'date'=>"21/2/2020",
            'status_id'=>3
        ]);
        DB::table('order')->insert([
            'store_id' => 1,
            'user_id'=>2,
            'shipping_address'=>"Cau giay Ha noi",
            'shipping_phone'=>"0914949671",
            'isNotification'=>0,
            'date'=>"1/1/2020",
            'status_id'=>1
        ]);
        DB::table('order')->insert([
            'store_id' => 2,
            'user_id' => 5,
            'shipping_address'=>"Quan 1 Thanh pho HCM",
            'shipping_phone'=>"0914949671",
            'isNotification'=>0,
            'date'=>"21/3/2020",
            'status_id'=>3
        ]);
    }
}
