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
            'quantity'=>2
        ]);
        DB::table('cart_detail')->insert([
            'cart_id'=>1,
            'product_id' => 1,
            'quantity'=>1,
            'note'=>'Cỡ XL, màu đen'

        ]);
    }
}
