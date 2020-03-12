<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            'name' => "Thời trang"
        ]);
        DB::table('product_category')->insert([
            'name' => "Điện thoại"
        ]);
        DB::table('product_category')->insert([
            'name' => "Đồ gia dụng"
        ]);
        DB::table('product_category')->insert([
            'name' => "Đồ ăn"
        ]);




    }
}
