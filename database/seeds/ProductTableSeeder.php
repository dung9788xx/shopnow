<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => "Áo khoác",
            'description'=>"Áo khoác mùa đông mỏng nhẹ giá rẻ",
            'price'=>250000,
            'promotion_price'=>240000,
            'amount'=>100,
            "store_id"=>1,
            "category_id"=>1
        ]);
        DB::table('product')->insert([
            'name' => "Áo sơ mi",
            'description'=>"Thiết kế trẻ trung năng động",
            'price'=>150000,
            'promotion_price'=>125000,
            'amount'=>100,
            "store_id"=>1,
            "category_id"=>1
        ]);
        DB::table('product')->insert([
            'name' => "Iphone X",
            'description'=>"Iphone X sách tay giá rẻ",
            'price'=>25000000,
            'promotion_price'=>24500000,
            'amount'=>20,
            "store_id"=>2,
            "category_id"=>2
        ]);
        DB::table('product')->insert([
            'name' => "Galaxy S20",
            'description'=>"Mẫu mới nhất của điện thoại samsung được ra mắt vào đầu năm 2020 với thiết kế trẻ trung đầy phong độ. ",
            'price'=>1500000,
            'amount'=>100,
            "store_id"=>2,
            "category_id"=>2
        ]);
    }
}
