<?php

use Illuminate\Database\Seeder;

class LomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lomas')->insert([
            'nosaukums' => ('galvenais')
        ]);
        DB::table('lomas')->insert([
            'nosaukums' => ('vaditajs')
        ]);
        DB::table('lomas')->insert([
            'nosaukums' => ('darbinieks')
        ]);
        DB::table('lomas')->insert([
            'nosaukums' => ('dalibnieks')
        ]); 
        DB::table('lomas')->insert([
            'nosaukums' => ('vecaks')
        ]);
    }
}
