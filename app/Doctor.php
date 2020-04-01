<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $fillable = [
        'email',
        'doctor_name',
        'password',
        'national_id',
        'pharmacy_id' //for now it is fillable
    ];
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
    
}
