<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $temp =  [
            'id' => $this->id,
            'name' => $this->name,
            'company' => $this->company,
            'last_name' => $this->last_name,
            'photo_url' => $this->photo_url,
            'informations' => $this->when(isset($this->informations), ContactInformationResource::collection($this->informations))
        ];

        return $temp;
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
