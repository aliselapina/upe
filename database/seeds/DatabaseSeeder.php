<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(
        //     AtbalstitajsTableSeeder::class
        // );
        // $this->call(
        //     LomasSeeder::class
        // );
        // $this->call(
        //     NometnesSeeder::class
        // );
        $this->call(
            UsersSeeder::class
        );
    }
}
