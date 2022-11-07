<?php

namespace App\Models\Inscriptions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inscriptions\Course;
class Quota extends Model
{
      // protected $table = 'quotas';
      protected $fillable = [
        'assigned',
        'accepted',
        'remaining',
        'course_id',
        'inscription_lapse_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public static function last_lapse_id()
    {
        $last_id = self::select('inscription_lapse_id')->orderByDesc('inscription_lapse_id')->first();

        return $last_id->inscription_lapse_id;
    }
}

