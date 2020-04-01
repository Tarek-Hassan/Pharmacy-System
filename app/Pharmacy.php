<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    //
    protected $fillable = [
        'email',
        'pharmacy_name',
        'password',
        'national_id'
    ];
    
    
    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
