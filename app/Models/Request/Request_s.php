<?php

namespace App\Models\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Documents\Type_Document;

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
        "address",
        "rep_name",
        "rep_DNI",
        "rep_phone_number",
        
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

        ) return true;
        
        else{ return false; }

    } 

    public function type_documents()
    {
        return $this->belongsToMany(Type_Document::class,'request_documents','request_s_id','type_document_id')->withPivot('name');;
    }


}
