<?php

use Illuminate\Database\Seeder;

class AtbalstitajsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('atbalstitajs')->insert([
            'nosaukums' => Str::random(10),
            'majaslapa' => Str::random(10).'.lv',
            'numurs' => Str::random(8),
            'rekviziti' => Str::random(30),
            'atbalsta_veids' => Str::random(10)
        ]);
        
    }
}
