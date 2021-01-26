<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    //
    protected $table = 'absences';

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'in_hour' => 'datetime',
        'out_hour' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
