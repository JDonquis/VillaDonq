<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    use HasFactory;

    protected $table = "type_users";

    protected $fillable = [ 'name' ];

    protected $guarded = [ 'id' ];

      public function user()
    {
        return $this->hasMany(User::class);
    }
}
