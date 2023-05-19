<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'full_name' => trim($this[1]->textContent),
            'name' => trim($this[2]->textContent),
            'academic_year' => trim($this[9]->textContent),
            'faculty' => trim($this[5]->textContent),
            'career' => trim($this[6]->textContent),
        ];
    }
}
