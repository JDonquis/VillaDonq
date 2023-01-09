<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscriptions\Quota;
use App\Models\Inscriptions\Section;

class Course extends Model
{      
      
      protected $fillable = ['name'];
      protected $guarded = 'id';

      public function quota()
      {
        return $this->hasMany(Quota::class,'course_id','id');
      }
      public function section()
      {
          return $this->belongsToMany(Section::class,'course_sections');
      }


                
}
