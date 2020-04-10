<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pharmacy extends Authenticatable
{
    use Notifiable;
    protected $guard='pharmacy';
    //
    protected $fillable = [
        'national_id',
        'pharmacy_name',
        'img',
        'email',
        'password',   
        'priority',
        'address_id',
          
    ];
    
    protected $hidden = [
        'password',
    ];
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
    
    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
