<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'year' => $this->year,
            'imdbID' => $this->imdbID,
            'type' => $this->type,
            'poster' => $this->poster
        ];
    }
}
