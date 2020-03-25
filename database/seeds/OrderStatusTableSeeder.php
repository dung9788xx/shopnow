<?php

use Illuminate\Database\Seeder;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'name' => "Đang đợi cửa hàng xử lý",
        ]);
        DB::table('order_status')->insert([
            'name' => "Đang được giao",
        ]);
        DB::table('order_status')->insert([
            'name' => "Đã nhận hàng",
        ]);
        DB::table('order_status')->insert([
            'name' => "Đợn hàng bị hủy",
        ]);
    }
}
