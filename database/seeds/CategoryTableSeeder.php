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
            'name' => "Thời trang",
            'detail'=>"Quần áo nam nữ, phụ kiện thời trang"
        ]);
        DB::table('product_category')->insert([
            'name' => "Điện thoại",
            "detail"=>"Các sản phẩm điện thoại, máy tính bảng"
        ]);
        DB::table('product_category')->insert([
            'name' => "Đồ gia dụng",
            "detail"=>"Các đồ gia dụng thiết yếu cho gia đình"

        ]);
        DB::table('product_category')->insert([
            'name' => "Đồ ăn",
            "detail"=>"Đồ ăn nhanh, thực phẩm, bánh kẹo cho bạn"
        ]);




    }
}
