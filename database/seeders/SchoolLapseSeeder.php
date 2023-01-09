<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SchoolLapseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $fields = [

            ['start' => '2022-01-07', 'end' => '2023-11-07'],
     

         ];   

         DB::table('school_lapses')->insert($fields);
    }
}
