<?php

namespace App\Services;

use Carbon\Carbon;
use DOMDocument;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Symfony\Component\DomCrawler\Crawler;

class ConnectionService
{
    private $EVEREST_URL = 'https://everest.cargotrack.net';

    public function createContext(array $request)
    {
        $postdata = http_build_query([
            'name' => 'f1',
            'carnet' => $request['id'],
            'pin' => $request['password'],
            'anyo_lec' => $request['year'],
            'npag' => '2',
        ]);

        $opts = ['http' => [
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata,
            //'timeout' => 5,
        ]];

        return stream_context_create($opts);
    }

    public function connect(array $request, $year = null)
    {
        if ($year) {
            $result = file_get_contents('no/' . $year . '.html', false);
        } else {
            $result = file_get_contents(
                'https://portalestudiantes.unanleon.edu.ni/consulta_estudiantes.php',
                false,
                $this->createContext($request)
            );
        }

        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($result, 'HTML-ENTITIES', 'UTF-8'));

        return $dom->getElementsByTagName('center')->length == 0
            ? false
            : $dom;
    }

    public function connectToEverestCargotrack(array $request)
    {
        $client = new Client();
        $firstDateTime = '';

        $response = $client->post($this->EVEREST_URL . "/m/track.asp", [
            RequestOptions::FORM_PARAMS => $request,
        ]);

        $htmlContent = $response->getBody()->getContents();

        $crawler = new Crawler($htmlContent);

        $table3 = $crawler->filter('table')->eq(2);
        $status = $table3->filter('tr:nth-child(2) td div strong')->text();

        if ($status == 'NO SE HA ENCONTRADO') {
            return response()->json(['message' => 'No se ha encontrado el paquete'], 404);
        }

        $table4 = $crawler->filter('table')->eq(3);
        $table6 = $crawler->filter('table')->eq(5);

        $rowsTable5 = $table6->filter('tr');

        $resultTable5 = $rowsTable5->each(function ($row) use (&$firstDateTime) {
            $rawDate = $row->filter('td span.ntext')->text();
            $dateTime = str_replace("\xc2\xa0", " ", $rawDate);
            $title = $this->cleanTitle($row->filter('td.ntextrow')->text(), $rawDate);

            $firstDateTime = $dateTime;

            return [
                'date' => Carbon::create($dateTime)->format('d/m/y g:i A'),
                'title' => $title,
            ];
        });

        $image = $table3->filter('tr:nth-child(3) td div img')->attr('src');
        [$firstDate] = explode(' ', $firstDateTime, 2);
        $dateKey = self::cleanDescription($table4->filter('tr td div')->html());

        $dateKey = str_replace($firstDate, Carbon::create($firstDate)->format('d/m/y'), $dateKey);

        $result = [
            'status' => $status,
            'image' => $this->EVEREST_URL . str_replace("..", "", $image),
            'date' => $dateKey,
            'history' => $resultTable5,
        ];

        return response()->json($result, 200);
    }

    private function cleanTitle($string, $date)
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
