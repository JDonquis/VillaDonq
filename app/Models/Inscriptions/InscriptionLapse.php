<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Inscriptions\SchoolLapse;

class InscriptionLapse extends Model
{     

      protected $table = 'inscription_lapses';  
      protected $fillable = [
        'start',
        'end',
        
    ];
    protected $guarded = 'id';


    public function school_lapse()
    {
        return $this->hasOne(SchoolLapse::class);
    }

    public function verify_date()
    {
        
        $Ldate = InscriptionLapse::select('end')->orderBy('id', 'desc')->first();
        $Ldate = $Ldate->end;
        $Ndate = Carbon::now();
        $Ndate = $Ndate->format('Y-m-d');

        return $Ldate >= $Ndate ? true:false; 
    }

}
