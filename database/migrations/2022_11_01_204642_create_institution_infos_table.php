<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_infos', function (Blueprint $table) {
            $table->id();
            $table->string("name",100);
            $table->string("rif",10);
            $table->string("phone_number",11);
            $table->string("address",100);
            $table->string("email",30);
            $table->date("release");
            $table->string("motto",100);

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institution_infos');
    }
}
