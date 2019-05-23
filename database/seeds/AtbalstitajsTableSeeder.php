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
            'numurs' => ('12345678'),
            'epasts' => Str::random(4).'@'.str::random(4).'.com',
            'rekviziti' => Str::random(30),
            'atbalsta_veids' => Str::random(10),            
            'nometne_id' =>  ('1')         
        ]);
        
    }
}
