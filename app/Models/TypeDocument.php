<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDocument extends Model
{
    use HasFactory;

    protected $fillable = ['name','status','required'];

    public $timestamps = false;

    public static function verifyType($document)
    {
        if(
            $doc->getMimeType() == 'image/jpg'
         || $doc->getMimeType() == 'image/jpeg' 
         || $doc->getMimeType() == 'image/png' 
         || $doc->getMimeType() == 'application/pdf'

        ) 
            return true;
     
        else
            return false; 
    }
}
