<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'medicine'=> new MedicineResource($this->medicine),
            'total_quantity'=>$this->quantity,
            'total_price'=>$this->total_price,
            'order_info'=>new OrderResource($this->order),
            'pharmacy_info'=> new PharmacyResource($this->pharmacy)
        
        ];
    }
}
