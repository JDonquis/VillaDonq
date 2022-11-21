<?php

namespace App\Models\Institution;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionInfo extends Model
{
    protected $table = 'institution_infos';
    public $timestamps = false;
    protected $fillable = [

        'name',
        'rif',
        'phone_number',
        'address',
        'email',
        'release',
        'motto'

    ];
    protected $guarded = 'id';



}
