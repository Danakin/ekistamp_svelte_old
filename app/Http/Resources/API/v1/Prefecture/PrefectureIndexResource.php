<?php

namespace App\Http\Resources\API\v1\Prefecture;

use Illuminate\Http\Resources\Json\JsonResource;

class PrefectureIndexResource extends JsonResource
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
            'hiragana' => $this->hiragana,
            'katakana' => $this->katakana,
            'katakana_half' => $this->katakana_half,
            'romaji' => $this->romaji,
        ];
    }
}
