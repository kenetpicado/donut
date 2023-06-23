<?php

namespace App\Services;

use App\Http\Resources\ComponentResource;
use App\Http\Resources\CourseResource;

class DataService
{
    public function purge($dom): object
    {
        return (object) [
            'labels' => $dom->getElementsByTagName('strong'),
            'average' => $dom->getElementsByTagName('center'),
            'rows' => $dom->getElementsByTagName('table')->item(3)->getElementsByTagName('tr'),
        ];
    }

    public function isHeader($value): bool
    {
        $headers = ['Ciclo', 'Curso'];

        foreach ($headers as $header) {
            if (str_contains($value, $header)) {
                return true;
            }
        }

        return false;
    }

    public function transformCyclesToArray($rows): array
    {
        $cycles = [];
        $rowCount = $rows->length;

        for ($i = 1; $i < $rowCount; $i++) {

            $cols = $rows[$i]->getElementsByTagName('td');
            $colName = $cols[0]->textContent;

            if ($this->isHeader($colName)) {
                $components = [];

                for ($j = $i + 1; $j < $rowCount; $j++) {
                    $component = $rows[$j]->getElementsByTagName('td');

                    if ($this->isHeader($component[0]->textContent)) {
                        break;
                    }
                    $i++;

                    $components[] = match (true) {
                        str_contains($colName, 'Curso') => CourseResource::make($component),
                        default => ComponentResource::make($component),
                    };
                }

                $cycles[] = [
                    'name' => $cols[0]->textContent,
                    'components' => $components,
                ];
            }
        }

        return $cycles;
    }
}
