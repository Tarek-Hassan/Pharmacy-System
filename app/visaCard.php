<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visaCard extends Model
{
    //
    protected $fillable = [
        'vise_number'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
