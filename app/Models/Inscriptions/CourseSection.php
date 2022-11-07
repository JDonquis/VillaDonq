<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
      protected $table = 'course_sections';  
      protected $fillable = [
        'course_id',
        'section_id',
    ];
    protected $guarded = 'id';

}
