<?php

namespace App\Models\Documents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Document extends Model
{
    protected $table = "type_documents";

     protected $guarded = ['id'];

    protected $fillable = ['name','status','required'];
}
