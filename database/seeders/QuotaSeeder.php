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

            ['assigned' => 0, 'accepted' => 0, 'remaining' => 0, 'course_id' =>'1','inscription_lapse_id' => '1' ],
            ['assigned' => 0, 'accepted' => 0, 'remaining' => 0, 'course_id' =>'2','inscription_lapse_id' => '1' ],
            ['assigned' => 0, 'accepted' => 0, 'remaining' => 0, 'course_id' =>'3','inscription_lapse_id' => '1' ],
            ['assigned' => 0, 'accepted' => 0, 'remaining' => 0, 'course_id' =>'4','inscription_lapse_id' => '1' ],
            ['assigned' => 0, 'accepted' => 0, 'remaining' => 0, 'course_id' =>'5','inscription_lapse_id' => '1' ],
     

         ];   

         DB::table('quotas')->insert($fields);
    }
}
