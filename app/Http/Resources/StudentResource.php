<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => trim($this->labels[7]->textContent),
            'id' => trim($this->labels[8]->textContent),
            'grade' => trim($this->labels[4]->textContent),
            'average' => trim($this->average[0]->textContent),
        ];
    }
}
