<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    
    protected $fillable = [
        'medicine_name',
        'type',
        'price'
    ];
    
    public function order()
    {
        return $this->belongsToMany('App\MedicineOrder','medicine_orders','order_id','medicine_id');
    }
}
