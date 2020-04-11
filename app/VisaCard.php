<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisaCard extends Model
{
    //
    protected $fillable = [
        'amount','card_number','card_cvc','exp_date','user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
