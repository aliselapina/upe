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

        DB::table('nometnes')->insert([
            'nosaukums' => ('Upe 2018'),
            'sakums' => ('18.07.11'),
            'beigas' => ('18.07.17'),
            'vieta' => ('Ganibas'),
            'dalib_sk' => ('60'),
            'apraksts' => ('tema - krasas')
        ]);
        DB::table('nometnes')->insert([
            'nosaukums' => ('Upe 2017'),
            'sakums' => ('17.07.11'),
            'beigas' => ('17.07.17'),
            'vieta' => ('Ganibas'),
            'dalib_sk' => ('60'),
            'apraksts' => ('tema - celojums')
        ]);
        DB::table('nometnes')->insert([
            'nosaukums' => ('Upe 2016'),
            'sakums' => ('16.07.11'),
            'beigas' => ('16.07.17'),
            'vieta' => ('Kaibala'),
            'dalib_sk' => ('50'),
            'apraksts' => ('tema - latvijas geografija')
        ]);
        DB::table('nometnes')->insert([
            'nosaukums' => ('Upe 2015'),
            'sakums' => ('15.07.11'),
            'beigas' => ('15.07.17'),
            'vieta' => ('Gancauskas'),
            'dalib_sk' => ('70'),
            'apraksts' => ('tema - puukji')
        ]);
    }
}
