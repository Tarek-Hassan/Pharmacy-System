<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'national_id',
        'doctor_name',
        'img',
        'email',
        'password',
        'pharmacy_id' //for now it is fillable
    ];


    protected $hidden = [
        'password',
    ];
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
    
}
