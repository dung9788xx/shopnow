<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Trương Văn Dũng",
            'username'=>"admin",
            'address'=>"Luong thien son duong tuyen quang",
            'phone' =>"0914949671",
            'level'=>1,
            'active'=>1,
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => "Trương Văn Bình",
            'username'=>"user",
            'address'=>"Luong thien son duong tuyen quang",
            'phone' =>"0368259129",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'name' => "Hà Kim Hằng",
            'username'=>"store1",
            'address'=>"Lang son",
            'phone' =>"0368259234",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store1'),
        ]);
        DB::table('users')->insert([
            'name' => "Nguyễn Văn Trung",
            'username'=>"store2",
            'address'=>"Phu tho",
            'phone' =>"036234553",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store2'),
        ]);
        DB::table('users')->insert([
            'name' => "Nguyen van A",
            'username'=>"user1",
            'address'=>"Quan 1 Tp Ho chi minh",
            'phone' =>"01234569872",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user1'),
        ]);
        DB::table('users')->insert([
            'name' => "Lê thị Anh",
            'username'=>"store3",
            'address'=>"Cầu giấy , Hà nội",
            'phone' =>"0834555222",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store3'),
        ]);
        DB::table('users')->insert([
            'name' => "Hà Thị Hồng",
            'username'=>"store4",
            'address'=>"Bắc Giang",
            'phone' =>"0345679992",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store4'),
        ]);
    }
}
