<?php

namespace App\Models\Person;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'user_id',
        'course_section_id',
        'rep_name',
        'rep_last_name',
        'rep_DNI',
        'rep_phone_number',
        'rep_email'
        
    ];

    protected $guarded = ['id'];

    public $timestamps = false;

}
