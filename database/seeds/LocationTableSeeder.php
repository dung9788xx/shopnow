<?php

use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('location')->insert([
            'name' => "Lạng Sơn"
        ]);
        DB::table('location')->insert([
            'name' => "Thái Nguyên"
        ]);
        DB::table('location')->insert([
            'name' => "Tuyên Quang"
        ]);
        DB::table('location')->insert([
            'name' => "Hà Nội"
        ]);
        DB::table('location')->insert([
            'name' => "Phú Thọ"
        ]);
        DB::table('location')->insert([
            'name' => "Bắc Giang"
        ]);
    }
}
