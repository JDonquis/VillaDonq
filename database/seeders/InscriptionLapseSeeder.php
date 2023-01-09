<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class InscriptionLapseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [

            ['start' => '2022-09-07', 'end' => '2022-12-07','school_lapse_id' => 1 ],
     

         ];   

         DB::table('inscription_lapses')->insert($fields);
    }
}
