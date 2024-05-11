<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade")->onUpdate("restrict");
            $table->foreignId("course_section_id")->constrained()->onDelete("restrict")->onUpdate("cascade");
            $table->string("name",50);
            $table->string("last_name",50);
            $table->string("DNI",30)->unique();
            $table->string("email",100)->nullable();
            $table->string("phone_number",30)->nullable();
            $table->date("date_birth");
            $table->string("address",100)->nullable();
            $table->string("state",20)->nullable();
            $table->string("city",20)->nullable();
            $table->string("photo",100)->default('guest.webp');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
