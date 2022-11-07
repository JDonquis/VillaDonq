<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class InstitutionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $fields = [

            ['name' => 'VillaDonq', 'email' => 'villadonq@gmail.com' ],
     

         ];   

         DB::table('institution_infos')->insert($fields);
    }
    
}
