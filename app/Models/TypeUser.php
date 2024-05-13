<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
