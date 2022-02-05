<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingGood extends JsonResource
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
            'id' => $this->id ,
            'description' => $this->description ,
            'location' => $this->location,
            'longitude' => $this->longitude ,
            'latitude' => $this->latitude ,
            'phone' =>$this->phone ,
            'phone_delivery' => $this->phone_delivery ,
            'cost' => $this->cost ,
            'type' => $this->order_type ,

        ];
    }
}
