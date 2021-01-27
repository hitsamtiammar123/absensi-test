<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    //

    const FORMAT_DISPLAY = 'Y-m-d H:i:s';
    protected $table = 'absences';

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $casts = [];

    protected $dates = [
        'in_hour',
        'out_hour'
    ];

    protected $format_date = 'l d F Y, H:i:s';

    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function getInHourMessageAttribute($value){
        return "Anda masuk pada pukul {$this->in_hour->format('H:i:s')} pada hari {$this->in_hour->format('l, d F Y')}";
    }

    public function getOutHourMessageAttribute($value){
        return "Anda keluar pada pukul {$this->out_hour->format('H:i:s')} pada hari {$this->out_hour->format('l, d F Y')}";
    }

    public function getIsFulfilledAttribute(){
        return !is_null($this->in_hour) && !is_null($this->out_hour);
    }

    public function getInHourFormatedAttribute(){
        return $this->in_hour ? $this->in_hour->format($this->format_date) : '';
    }

    public function getOutHourFormatedAttribute(){
        return $this->out_hour ? $this->out_hour->format($this->format_date) : '';
    }

}
