<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class QuotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             $fields = [

            ['assigned' => 30, 'accepted' => 0, 'remaining' => 30, 'course_id' =>'1','inscription_lapse_id' => '1' ]
     

         ];   

         DB::table('quotas')->insert($fields);
    }
}
