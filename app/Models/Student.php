<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\CourseSection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{      
    protected $table = 'students';

    protected $fillable = [
        'representative_id',
        'course_section_id',
        'name',
        'last_name',
        'date_birth',
        'email',
        'DNI',
        'phone_number',
        'sex',
        'previous_school',
        'photo',
    ];

    public $timestamps = false;

    public function representative()
    {
        return $this->belongsTo(Representative::class);
    }

    public function course_section()
    {
        return $this->belongsTo(CourseSection::class);
    }

    public static function saveDocs($document, $current = false, $documentName)
    {


            if($current)
            {
                Storage::disk('public')->delete("request/".$documentName."/".$current);
            }

                $doc_name = Str::random(25).".".$document->extension();
            
                $document->storeAs('request/'.$documentName, $doc_name, 'public');
            
                return $doc_name;            
    }
}
