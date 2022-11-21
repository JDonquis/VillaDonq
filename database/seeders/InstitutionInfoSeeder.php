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

            ['name' => 'VillaDonq',
             'email' => 'villadonq@gmail.com',
             'rif' => 'v123456789',
             'phone_number' => '04125800610',
             'address' => 'Entre Av.Manaure y Av.Ruiz Pineda',
             'release' => '2002-09-07',
             'motto' => 'La escuela del futuro ya llegó a prestarte a mejor educación',

              ],
     

         ];   

         DB::table('institution_infos')->insert($fields);
    }
    
}
