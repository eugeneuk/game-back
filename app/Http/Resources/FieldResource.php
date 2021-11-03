<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'id'            => $this->id,
            'label'         => $this->label,
            'description'   => $this->description,
            'game_id'       => $this->game_id,
            'contents'      => ContentResource::collection($this->vals),
            'created_at'    => $this->created_at,
        ];
    }
}
