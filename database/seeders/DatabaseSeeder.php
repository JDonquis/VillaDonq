<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->truncateTable([

            'courses',
            'sections',
            'request_status',
            'type_documents',
            'type_users',
            'users',
            'institution_infos',
            'inscription_lapses',
            'quotas'


        ]);

        $this->call([

            CourseSeeder::class,
            SectionSeeder::class,
            RequestStatusSeeder::class,
            TypeUserSeeder::class,
            UserSeeder::class,
            TypeDocumentSeeder::class,
            InstitutionInfoSeeder::class,
            InscriptionLapseSeeder::class,
            QuotaSeeder::class,

            
        ]);
    }

    protected function truncateTable(array $tables){

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table)
        {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
