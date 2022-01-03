<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'cover' => $this->cover,
            'author' => $this->author,
            'description' => $this->description,
            'pages' => $this->pages,
            'language' => $this->language,
            'price' => $this->price,
            'icon' => $this->iconUrl,
            'link' => route('front.books.show', $this->slug)
        ];
    }
}
