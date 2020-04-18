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
            'location_id' => 1,
            'province_id'=>57,
            'district_id'=>646,
            'ward_id'=>10229,
            'street'=>"Số 3, đường Làng"
        ]);
        DB::table('location')->insert([
            'location_id' => 2,
            'province_id'=>57,
            'district_id'=>646,
            'ward_id'=>10229,
            'street'=>"Số 4, đường Làng"
        ]);
        DB::table('location')->insert([
            'location_id' => 3,
            'province_id'=>60,
            'district_id'=>676,
            'ward_id'=>10739,
            'street'=>"Số 12"
        ]);
        DB::table('location')->insert([
            'location_id' => 4,
            'province_id'=>42,
            'district_id'=>504,
            'ward_id'=>8119,
            'street'=>"Số 123, đường Phú lộc"
        ]);
        DB::table('location')->insert([
            'location_id' => 5,
            'province_id'=>1,
            'district_id'=>6,
            'ward_id'=>81,
            'street'=>"Số 78"
        ]);
        DB::table('location')->insert([
            'location_id' => 6,
            'province_id'=>2,
            'district_id'=>28,
            'ward_id'=>385,
            'street'=>"Số 193"
        ]);
        DB::table('location')->insert([
            'location_id' => 7,
            'province_id'=>28,
            'district_id'=>369,
            'ward_id'=>5871,
            'street'=>"Số 3, đường Làng"
        ]);


    }
}
