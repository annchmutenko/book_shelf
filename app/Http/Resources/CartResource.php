<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'book' => BookResource::make($this->book)
        ];
    }
}
