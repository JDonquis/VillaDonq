<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscriptions\InscriptionLapse;

class SchoolLapse extends Model
{
    protected $table = 'school_lapses';

       protected $fillable = [
        'start',
        'end',
        'status',
    ];
    protected $guarded = 'id';

    public $timestamps = false;

   
     public function inscription_lapse()
    {
        return $this->hasOne(InscriptionLapse::class);
    }    
  
}
