<?php

namespace App\Models\Person;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
     protected $fillable = 
     [
        'user_id',
        'course_section_id',
        'name',
        'last_name',
        'DNI',
        'email',
        'phone_number',
        'date_birth',
        'address',
        'state',
        'address',
        'photo',
    ];

    protected $guarded = ['id'];

    public $timestamps = false;

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
