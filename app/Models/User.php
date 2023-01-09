<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TypeUser;
use Session;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_user_id',
        'DNI',
        'name',
        'last_name',
        'email',
        'password',
        'phone_number',
        'address',
        'date_birth',
        'state',
        'city',
        'photo'
    ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [  'password',  ];

    // 'remember_token',


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function type_user()
    {
        return $this->belongsTo(TypeUser::class);
    }

    public function set_session($type_user)
    {
        Session::put([

            'id_user' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'type_user_id' => $type_user[0]['id'],
            'type_user_name' => $type_user[0]['name']

        ]);
        // session([

        //     'id_user' => $this->id,
        //     'name' => $this->name,
        //     'last_name' => $this->last_name,
        //     'type_user_id' => $type_user[0]['id'],
        //     'type_user_name' => $type_user[0]['name']

        // ]);
    }
}
