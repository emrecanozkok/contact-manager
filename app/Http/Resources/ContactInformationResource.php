<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'information_type' => $this->information_type,
            'information_content' => $this->information_content
        ];
    }

    public function with($request)
    {
        return ['status' => 'success'];
    }
}
