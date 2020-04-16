<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable

{
    use Notifiable;
    protected $guard='doctor';
    protected $fillable = [
        'docImage',
        'name',
        'email',
        'password',
        'national_id',
        'pharmacy_id',
    ];
    
    protected $hidden = [
        'password',
    ];

}
