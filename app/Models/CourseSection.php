<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseSection extends Model
{
  protected $table = 'course_sections';  
  
  protected $fillable = 
  [
    'course_id',
    'section_id',
  ];
  
  protected $guarded = 'id';


  public function course()
  {
      return $this->belongsTo(Course::class);
  }
  

  public function section()
  {
      return $this->belongsTo(Section::class);
  }

}
