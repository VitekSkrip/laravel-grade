<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'image' => $this->image?->url,
            'published_at' => $this->published_at
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
        ];
    }
}
