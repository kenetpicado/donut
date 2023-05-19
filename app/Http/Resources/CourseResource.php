<?php

namespace App\Http\Resources;

use App\Traits\FormatValueTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    use FormatValueTrait;

    public function toArray($request)
    {
        return [
            'name' => $this->formatValue($this[0]?->textContent),
            'final' => $this->formatValue($this[7]?->textContent) ?? $this->formatValue($this[6]?->textContent),
        ];
    }
}
