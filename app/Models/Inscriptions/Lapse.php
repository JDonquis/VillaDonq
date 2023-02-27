<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapse extends Model
{

      protected $fillable = [
        'start',
        'end',
        'number',
        'school_lapse_id'
    ];
      protected $guarded = 'id';

      public $timestamps = false;
      
}
