<?php

namespace App\Http\Resources;

use App\Http\Resources\Profile\UserResource;
use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'        =>  $this->id,
            'name'      =>  $this->name,
            'price'     =>  $this->price,
            'game'      =>  $this->game->name ?? null,
            'game_id'   =>  $this->game_id,
            'type'      =>  $this->type->name ?? null,
            'user'      =>  new UserResource($this->user) ?? '',
            'created_at'=>  $this->created_at,
            'fields'    => [],
            'results'  => $this->fields ?? [],
        ];
    }
}
