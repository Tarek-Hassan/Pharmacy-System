<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'delivery_address'
    ];
    
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
}
