<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    

    protected $fillable = [
        'is_insured',
        'img',
        'user_id',
        'delivery_address_id'

    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }
}
