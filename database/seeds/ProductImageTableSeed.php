<?php

use Illuminate\Database\Seeder;

class ProductImageTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_image')->insert([
            'product_id' => 1,
            'image_name'=>"1.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 1,
            'image_name'=>"2.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 1,
            'image_name'=>"3.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 2,
            'image_name'=>"1.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 2,
            'image_name'=>"2.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 2,
            'image_name'=>"3.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 3,
            'image_name'=>"1.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 3,
            'image_name'=>"2.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 3,
            'image_name'=>"3.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 4,
            'image_name'=>"1.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 4,
            'image_name'=>"2.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 4,
            'image_name'=>"3.png",
        ]);

        //
        DB::table('product_image')->insert([
            'product_id' => 5,
            'image_name'=>"1.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 5,
            'image_name'=>"2.png",
        ]);
        DB::table('product_image')->insert([
            'product_id' => 5,
            'image_name'=>"3.png",
        ]);
    }
}
