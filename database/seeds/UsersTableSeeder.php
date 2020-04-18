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
            'location_id'=>1,
            'phone' =>"0914949671",
            'level'=>1,
            'active'=>1,
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => "Trương Văn Bình",
            'username'=>"user",
            'location_id'=>2,
            'phone' =>"0368259129",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user'),
        ]);
        DB::table('users')->insert([
            'name' => "Hà Kim Hằng",
            'username'=>"store1",
            'location_id'=>3,
            'phone' =>"0368259234",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store1'),
        ]);
        DB::table('users')->insert([
            'name' => "Nguyễn Văn Trung",
            'username'=>"store2",
            'location_id'=>4,
            'phone' =>"036234553",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store2'),
        ]);
        DB::table('users')->insert([
            'name' => "Nguyen van A",
            'username'=>"user1",
            'location_id'=>5,
            'phone' =>"01234569872",
            'level'=>3,
            'active'=>1,
            'password' => Hash::make('user1'),
        ]);
        DB::table('users')->insert([
            'name' => "Lê thị Anh",
            'username'=>"store3",
            'location_id'=>6,
            'phone' =>"0834555222",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store3'),
        ]);
        DB::table('users')->insert([
            'name' => "Hà Thị Hồng",
            'username'=>"store4",
            'location_id'=>7,
            'phone' =>"0345679992",
            'level'=>2,
            'active'=>1,
            'password' => Hash::make('store4'),
        ]);
    }
}
