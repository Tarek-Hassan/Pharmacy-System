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
        'area_id',  
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
