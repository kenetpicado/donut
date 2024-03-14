<?php

namespace App\Services;

use Carbon\Carbon;
use Symfony\Component\DomCrawler\Crawler;

class TrackService
{
    private ConnectionService $connectionService;

    private $EVEREST_URL = 'https://everest.cargotrack.net';

    public function __construct()
    {
        $this->connectionService = new ConnectionService();
    }

    public function getPackageInformation(array $request)
    {
        $htmlContent = $this->connectionService->getHtmlContent($this->EVEREST_URL . "/m/track.asp", $request);

        return $this->parseEverestData($htmlContent);
    }

    private function parseEverestData($htmlContent)
    {
        $firstDateTime = '';
        $explodedInformation = [];
        $crawler = new Crawler($htmlContent);

        $table3 = $crawler->filter('table')->eq(2);
        $status = $table3->filter('tr:nth-child(2) td div strong')->text();

        if ($status == 'NO SE HA ENCONTRADO') {
            return abort(404, 'No se ha encontrado el paquete');
        }

        $table4 = $crawler->filter('table')->eq(3);
        $table6 = $crawler->filter('table')->eq(5);

        $rowsTable5 = $table6->filter('tr');

        $history = $rowsTable5->each(function ($row) use (&$firstDateTime) {
            $rawDate = $row->filter('td span.ntext')->text();
            $cleanDateTime = self::cleanString($rawDate);

            $firstDateTime = $cleanDateTime;

            return [
                'date' => Carbon::create($cleanDateTime)->format('d/m/y g:i A'),
                'title' => $this->replaceAndClean($row->filter('td.ntextrow')->text(), $rawDate),
            ];
        });

        $image = $table3->filter('tr:nth-child(3) td div img')->attr('src');

        [$firstDate] = explode(' ', $firstDateTime, 2);

        $description = self::cleanString($table4->filter('tr td div')->text());

        $description = str_replace($firstDate, Carbon::create($firstDate)->format('d/m/y'), $description);

        if (str_contains($description, 'AM')) {
            $explodedInformation = $this->explodeInformation($description, "AM");
        }

        if (str_contains($description, 'PM')) {
            $explodedInformation = $this->explodeInformation($description, "PM");
        }

        return [
            'status' => $status,
            'image' => $this->EVEREST_URL . str_replace("..", "", $image),
            'date' => $explodedInformation['date'] ?? '',
            'track' => $explodedInformation['track'] ?? '',
            'guide' => $explodedInformation['guide'] ?? '',
            'info' => $explodedInformation['info'] ?? '',
            'history' => $history,
        ];
    }

    private function explodeInformation($description, $type)
    {
        [$date, $description] = array_map('trim', explode($type, $description));
        $descriptionParts = explode(' ', $description);

        return [
            'date' => $date . " $type",
            'track' => $descriptionParts[0] ?? null,
            'guide' => $descriptionParts[1] ?? null,
            'info' => $descriptionParts[2] ?? null,
        ];
    }

    private function replaceAndClean($string, $date)
    {
        return self::cleanString(str_replace($date, '', $string));
    }

    private function cleanString($string)
    {
        return trim(str_replace("\xc2\xa0", " ", $string));
    }

    public function cleanDescription($string)
    {
        $description = self::cleanString(str_replace(" class=\"ntextbig\"", '', str_replace("\r\n", '', $string)));
        return preg_replace('/\s+/', ' ', $description);
    }
}
