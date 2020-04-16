<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'delivery_address',
        'is_insured',
        'status',
        'creator_type',
        'pharmacy_id',
        'doctor_id',
    ];
    
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function medicine()
    {
        return $this->belongsToMany('App\MedicineOrder');
    }
}
