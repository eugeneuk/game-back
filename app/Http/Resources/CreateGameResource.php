<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CreateGameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected $type;
    // Atach @Type
    public function type($value){
        $this->type = $value;
        return $this;
    }

    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'fields'    => FieldResource::collection($this->fields),
            'type'      => $this->type ?? null,
            'created_at'=> $this->created_at,
        ];
    }
}
