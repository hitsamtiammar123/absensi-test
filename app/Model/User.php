<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];


    public function division(){
        return $this->hasOne(Division::class, 'id', 'division_id');
    }

    public function absences(){
        return $this->hasMany(Absence::class, 'user_id', 'id');
    }

    public function isAdmin(){
        return $this->role === 'ADMIN';
    }

    public function isEmployee(){
        return $this->role === 'EMPLOYEE';
    }
}
