<?php

namespace App\Http\Resources;

use App\Traits\FormatValueTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    use FormatValueTrait;

    public function toArray($request)
    {
        return [
            'name' => $this->cleanName($this->labels[7]->textContent),
            'id' => $this->cleanId($this->labels[8]->textContent),
            'grade' => trim($this->labels[4]->textContent),
            'average' => trim($this->average[0]->textContent),
        ];
    }
}
