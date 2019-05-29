<?php

use Illuminate\Database\Seeder;

class NometneUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            DB::table('nometne_users')->insert([
                'nometne_id' => ('4'),
                'user_id' => ('1')
    
            ]);
            DB::table('nometne_users')->insert([
                'nometne_id' => ('6'),
                'user_id' => ('2') 
            ]); 
    

    }
}
