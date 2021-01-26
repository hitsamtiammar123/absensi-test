<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    //
    protected $table = 'divisions';

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'nama'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'division_id');
    }
}
