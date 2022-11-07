<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [

            ['name' => '1er Año' ],
            ['name' => '2do Año' ],
            ['name' => '3er Año' ],
            ['name' => '4to Año' ],
            ['name' => '5to Año' ],
     

         ];   

         DB::table('courses')->insert($fields);
    }
}
