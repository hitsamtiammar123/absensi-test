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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
