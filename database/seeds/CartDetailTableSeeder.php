<?php

use Illuminate\Database\Seeder;

class CartDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_detail')->insert([
            'cart_id'=>1,
            'product_id' => 3,
            'price'=>25000000,
            'quantity'=>2
        ]);
        DB::table('cart_detail')->insert([
            'cart_id'=>1,
            'product_id' => 1,
            'price'=>250000,
            'quantity'=>1,
            'note'=>'Cỡ XL, màu đen'
        ]);
    }
}
