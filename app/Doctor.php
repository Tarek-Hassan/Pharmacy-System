<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use Notifiable;
    //
    protected $guard='doctor';
    
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
