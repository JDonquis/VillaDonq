<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscriptions\Course;

class Section extends Model
{
      protected $fillable = ['name'];
      protected $guarded = 'id';

      public function quota()
      {
        return $this->hasMany(Quota::class,'course_id','id');
      }
      public function course()
      {
          return $this->belongsToMany(Course::class,'course_sections');
      }


}
