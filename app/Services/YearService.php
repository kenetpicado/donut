<?php

namespace App\Services;

class YearService
{
    public function get()
    {
        return [
            '2022',
            '2021',
            '2020',
            '2019',
            '2018',
            '2017',
            '2016',
            '2015',
            '2014',
        ];
    }

    public function getRange($request)
    {
        $from = (int) $request->from;
        $years = [];

        while ($from <= $request->to) {
            array_push($years, $from);
            $from++;
        }

        return $years;
    }
}
