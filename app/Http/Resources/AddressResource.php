<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'street_name'=>$this->street_name,
            'building_number'=>$this->building_number,
            'floor_number'=>$this->floor_number,
            'flat_number'=>$this->flat_number,
            'is_main'=>$this->is_main,
            'user_id'=>$this->user_id,
            'user_info'=>new UserResource($this->user)
        ];
    }
}
