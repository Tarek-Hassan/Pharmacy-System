<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PharmacyResource extends JsonResource
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
            'pharmacy_name'=>$this->pharmacy_name,
            'pharmacy_avatar'=>$this->img,
            'pharmacy_address'=> new AreaResource($this->area)
        ];
    }
}
