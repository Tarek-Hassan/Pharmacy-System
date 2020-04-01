<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineOrder extends Model
{
    //
    protected $fillable = [
        'quantity',
        'total_price'
    ];
    
    
    public function pharmacy()
    {
        return $this->belongsTo('App\Pharmacy');
    }
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    
    
    public function medicine()
    {
        return $this->belongsTo('App\Medicine');
    }
}
