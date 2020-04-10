<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
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
    
    
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
