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
            'name' => Str::random(10),
            'username'=>"admin",
            'address'=>"Luong thien son duong tuyen quang",
            'phone' =>"0914949671",
            'level'=>1,
            'active'=>1,
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'username'=>"admin1",
            'address'=>"Luong thien son duong tuyen quang",
            'phone' =>"09149496711",
            'level'=>1,
            'active'=>1,
            'password' => Hash::make('admin1'),
        ]);
    }
}
