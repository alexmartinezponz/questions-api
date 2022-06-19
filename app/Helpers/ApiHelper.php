<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ApiHelper
{
    const SITE = 'stackoverflow';

    public function apiCall(array $params)
    {
        $params['site'] = self::SITE;

        $client = new Client(['base_uri' => env('EXTERNAL_BASE_API_URI')]);

        $response = $client->request('GET', '/2.3/questions', ['query' => $params]);

        return json_decode($response->getBody()->getContents());
    }
}