<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => ('pirmais'),
            'email' => ('lol@lol.lv'),
            'password' => ('viens'),
            'loma_id'=>('1')

        ]);
        DB::table('users')->insert([
            'name' => ('otrais'),
            'email' => ('ha@ha.com'),
            'password' => ('viens'),
            'loma_id'=>('2')
        ]); 
    }
}
