<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class TypeDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         $types = [

            ['name' => 'cer_notes', 'status' => 1, 'required' => 1],
            ['name' => 'cer_conduct', 'status' => 1, 'required' => 1],
            ['name' => 'cer_birth', 'status' => 1, 'required' => 1],
            ['name' => 'report_card', 'status' => 1, 'required' => 1],
            ['name' => 'photo', 'status' => 1, 'required' => 1],            

         ];   

         DB::table('type_documents')->insert($types);
    }
}
