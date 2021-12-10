<?php

namespace App\Http\Resources\API\v1\Station;

use Illuminate\Http\Resources\Json\JsonResource;

class StationIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'prefecture_id' => $this->prefecture_id,
            'city_id' => $this->city_id,
        ];
    }
}
