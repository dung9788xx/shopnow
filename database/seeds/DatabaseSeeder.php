<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(UsersTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CartDetailTableSeeder::class);
        $this->call(CartTableSeeder::class);
        $this->call(OrderDetailTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ProductImageTableSeed::class);
        DB::unprepared(Storage::disk("public")->get("AddressInfo.sql"));
    }
}
