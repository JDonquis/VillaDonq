<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $fields = [

            ['name' => 'Seccion A' ],
            ['name' => 'Seccion B' ],

     

         ];   

         DB::table('sections')->insert($fields);
    }
}
