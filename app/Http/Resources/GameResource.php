<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'letter'     => $this->letter,
            'description'=> $this->description,
            'created_at' => $this->created_at,
            'languages'      => LanguageResource::collection($this->langs)
        ];
    }
}
