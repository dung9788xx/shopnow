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
            'product_id' => 3,
            'quantity'=>2
        ]);
    }
}
