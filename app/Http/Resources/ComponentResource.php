<?php

namespace App\Http\Resources;

use App\Traits\FormatValueTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class ComponentResource extends JsonResource
{
    use FormatValueTrait;

    public function toArray($request)
    {
        $name = $this->formatValue($this[0]?->textContent);

        return [
            'name' => $name,
            $this->mergeWhen(!str_contains($name, 'ACTIVIDAD ESTUDIANTIL'), [
                'partial_1' => $this->formatValue($this[1]?->textContent),
                'partial_2' => $this->formatValue($this[2]?->textContent),
                'partial_3' => $this->formatValue($this[3]?->textContent),
                'final' => $this->formatValue($this[7]?->textContent) ?? $this->formatValue($this[4]?->textContent),
                'second_call' => $this->formatValue($this[5]?->textContent),
            ]),
            $this->mergeWhen(str_contains($name, 'ACTIVIDAD ESTUDIANTIL'), [
                'final' => $this->formatValue($this[1]?->textContent),
            ]),
        ];
    }
}
