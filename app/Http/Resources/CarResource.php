<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'price' => $this->price,
            'body' => $this->body,
            'body_id' => $this->body_id,
            'old_price' => $this->old_price,
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,    
        ];
    }
}
