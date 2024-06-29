<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'offer_type' => $this->offer_type,
            'placeable_id' => $this->placeable_id,
            'placeable_type' => $this->placeable_type,
            'rent_period' => $this->rent_period,
            'price' => $this->price,
            'proprio_name' => $this->proprio_name,
            'proprio_telephone' => $this->proprio_telephone,
            'photo_couverture' => $this->photo_couverture,
            'conditions' => $this->conditions,
            'description' => $this->description,
            'is_occupe' => $this->is_occupe,
            'has_parent' => false,
            //'parent_id' => $this->parent_id,
            'commune_id' => $this->commune_id,
            'facade_id' => $this->facade_id,
            'views' => $this->views,
            'visites' => $this->visites,
            
            'images' => $this->images,
            'videos' => $this->videos,

            //'parent' => $this->parent,
            'commune' => CommunesResource::make($this->commune),
            'interieur' => $this->interior,
            'exterieur' => $this->exterior,
            'comoditees' => $this->comodities,
            'fascade' => $this->fascade,
        ];
    }
}
