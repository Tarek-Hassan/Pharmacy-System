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
        'email',
        'name',
        'password',
        'national_id'
    ];
    
    protected $hidden = [
        'password',
    ];
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
