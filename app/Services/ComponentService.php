<?php

namespace App\Services;

use App\Classes\Component;

class ComponentService
{
    // Build components object grouped by cycles
    public function __invoke($rows)
    {
        $cycles = [];

        for ($i = 0; $i < $rows->length; $i++) {
            if ($i == 0) {
                continue; // Skip the first row
            }

            $cols = $rows[$i]->getElementsByTagName('td');

            if ($this->isHeader($cols[0]->textContent)) {
                $components = [];

                for ($j = $i + 1; $j < $rows->length; $j++) {
                    $component = $rows[$j]->getElementsByTagName('td');

                    if ($this->isHeader($component[0]->textContent)) {
                        break;
                    } else {
                        array_push($components, new Component($component));
                    }

                    $i++;
                }

                array_push($cycles, [
                    'name' => $cols[0]->textContent,
                    'components' => $components,
                ]);
            }
        }

        return $cycles;
    }

    // Check if the row is a header
    public function isHeader($value)
    {
        $headers = ['Ciclo', 'Curso'];

        foreach ($headers as $header) {
            if (str_contains($value, $header)) {
                return true;
            }
        }

        return false;
    }
}
