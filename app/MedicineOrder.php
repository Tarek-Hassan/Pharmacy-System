<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{

    protected $table = 'medicine_orders';
    //
    protected $fillable = [
        'medicine_id',
        'order_id',
        'user_id',
        'pharmacy_id',
        'quantity',
        'total_price'
    ];
    
    
    public function pharmacy()
    {
        return $this->belongsToMany('App\Pharmacy');
    }
    
    
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    
    
    public function order()
    {
        return $this->belongsToMany('App\Order');
    }
    
    
    public function medicine()
    {
        return $this->belongsToMany('App\Medicine');
    }
}
