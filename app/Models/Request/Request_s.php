<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Request_s extends Model
{
    protected $table = "requests";

    protected $fillable = [ 

        "request_statu_id",
        "year",
        "name",
        "last_name",
        "DNI",
        "age",
        "email",
        "phone_number",
        "date_birth",
        "state",
        "city",
        "cer_birth",
        "cer_notes",
        "cer_conduct",
        "report_card",
        "address",
        "rep_name",
        "rep_DNI",
        "rep_phone_number",
        "photo", 
        
         ];

    public static function set_docs($doc,$current = false,$type)
    {
        if($doc){

            if($current)
            {
                Storage::disk('public')->delete("request/".$type."/".$current);
            }

            if(self::verify_type_doc($doc))
            {
                $doc_name = Str::random(25).".".$doc->extension();
            
                $doc->storeAs('request/'.$type,$doc_name,'public');
            
                return $doc_name;
                
            }
            return false;

            

        }
    }



    public static function verify_type_doc($doc)
    {

        if(
               $doc->getMimeType() == 'image/jpg'
            || $doc->getMimeType() == 'image/jpeg' 
            || $doc->getMimeType() == 'image/png' 
            || $doc->getMimeType() == 'application/pdf'
            || $doc->getMimeType() == 'application/vnd.oasis.opendocument.text'
            || $doc->getMimeType() == 'application/msword'
            || $doc->getMimeType() == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ) return true;
        
        else{ return false; }


        

    } 

// if($value["type"]=='image/jpg' || $value["type"]=='image/jpeg' || $value["type"]=='image/png' || $value["type"]=='application/pdf' || $value["type"]=='application/vnd.oasis.opendocument.text' || $value["type"]=='application/msword' || $value["type"]=='application/vnd.openxmlformats-officedocument.wordprocessingml.document' )
}
