<?php

use Illuminate\Database\Seeder;

class OrderDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_detail')->insert([
            'order_id' => 1,
            'product_id'=>1,
            'name'=>"Áo khoác",
            'price'=>250000,
            'quantity'=>1
        ]);
        DB::table('order_detail')->insert([
            'order_id' => 1,
            'product_id'=>2,
            'name'=>"Áo sơ mi",
            'price'=>250000,
            'quantity'=>1
        ]);
        DB::table('order_detail')->insert([
            'order_id' => 2,
            'product_id'=>2,
            'name'=>"Áo sơ mi",
            'price'=>250000,
            'quantity'=>5
        ]);
        DB::table('order_detail')->insert([
            'order_id' => 3,
            'product_id'=>3,
            'name'=>"Iphone X",
            'price'=>25000000,
            'quantity'=>1
        ]);

    }
}
