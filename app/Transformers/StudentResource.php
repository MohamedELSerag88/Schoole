<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'grade'   => $this->grade,
            'age'   => $this->age
        ];
    }
}
