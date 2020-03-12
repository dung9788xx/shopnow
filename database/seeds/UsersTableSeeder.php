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
            'username'=>"store",
            'address'=>"Luong thien son duong tuyen quang",
            'phone' =>"0368259129",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store'),
        ]);
        DB::table('users')->insert([
            'name' => "Hà Kim Hằng",
            'username'=>"user",
            'address'=>"Lang son",
            'phone' =>"0368259234",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'name' => "Nguyễn Văn Trung",
            'username'=>"user1",
            'address'=>"Phu tho",
            'phone' =>"036234553",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user1'),
        ]);
    }
}
