<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request\Request_s;

class Type_Document extends Model
{
    protected $table = "type_documents";

     protected $guarded = ['id'];

    protected $fillable = ['name','status','required'];

    public function request()
    {
        return $this->belongsToMany(Request_s::class,'request_documents');
    }
}
