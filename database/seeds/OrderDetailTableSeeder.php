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
            'order_id' => 2,
            'product_id'=>3,
            'name'=>"Quần bò",
            'price'=>350000,
            'quantity'=>2
        ]);
        DB::table('order_detail')->insert([
            'order_id' => 3,
            'product_id'=>4,
            'name'=>"25000000",
            'price'=>25000000,
            'quantity'=>1
        ]);

    }
}
