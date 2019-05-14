<?php

use Illuminate\Database\Seeder;

class NometnesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nometnes')->insert([
            'nosaukums' => ('Upe 2019'),
            'sakums' => ('19.07.11'),
            'beigas' => ('19.07.17'),
            'vieta' => ('Ganibas'),
            'dalib_sk' => ('60'),
            'apraksts' => ('tema - festivals')
        ]);
    }
}
