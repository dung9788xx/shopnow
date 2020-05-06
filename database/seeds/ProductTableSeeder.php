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
            'description' => "Áo khoác mùa đông mỏng nhẹ giá rẻ",
            'price' => 250000,
            'promotion_price' => 240000,
            'amount' => 100,
            "store_id" => 1,
            "category_id" => 1
        ]);
        DB::table('product')->insert([
            'name' => "Áo sơ mi",
            'description' => "Thiết kế trẻ trung năng động",
            'price' => 150000,
            'promotion_price' => 125000,
            'amount' => 100,
            "store_id" => 1,
            "category_id" => 1
        ]);
        DB::table('product')->insert([
            'name' => "Iphone X",
            'description' => "Iphone X sách tay giá rẻ",
            'price' => 25000000,
            'promotion_price' => 24500000,
            'amount' => 20,
            "store_id" => 2,
            "category_id" => 2
        ]);
        DB::table('product')->insert([
            'name' => "Galaxy S20",
            'description' => "Mẫu mới nhất của điện thoại samsung được ra mắt vào đầu năm 2020 với thiết kế trẻ trung đầy phong độ. ",
            'price' => 1500000,
            'amount' => 100,
            "store_id" => 2,
            "category_id" => 2
        ]);
        DB::table('product')->insert([
            'product_id' => 5,
            'name' => "OPPO Reno2 F",
            'description' => "OPPO Reno2 F là một trong 3 chiếc smartphone thuộc dòng OPPO Reno2 vừa được OPPO giới thiệu với thiết kế thời trang cùng nhiều nâng cấp mạnh mẽ về camera. Màn hình:	AMOLED, 6.5\", Full HD+
Hệ điều hành:	Android 9.0 (Pie)
Camera sau:	Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP
Camera trước:	16 MP
CPU:	MediaTek Helio P70 8 nhân
RAM:	8 GB
Bộ nhớ trong:	128 GB
Thẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB
Thẻ SIM:
2 Nano SIM, Hỗ trợ 4G ",
            'price' =>8990000,
            'promotion_price' =>7490000,
            'amount' => 20,
            "store_id" => 2,
            "category_id" => 2
        ]);
    }
}
