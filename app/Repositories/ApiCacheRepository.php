<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IApi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Helpers\ApiHelper;

class ApiCacheRepository implements IApi
{
    protected $prefixTag;
    protected $timeCache = 5;
    protected $api_helper;

    function __construct(ApiHelper $apiHelper)
    {
        $this->api_helper = $apiHelper;
    }

    public function getDataCached($params)
    {
        $fromdate = !empty($params['fromdate']) ? $params['fromdate'] : Carbon::now()->startOfMonth()->format('Y-m-d');
        $todate = !empty($params['todate']) ? $params['todate'] : Carbon::now()->format('Y-m-d');

        return Cache::tags($this->prefixTag)->remember("{$this->prefixTag}.get.{$params['tagged']}{$fromdate}{$todate}", $this->timeCache, function () use ($params) {
            return $this->api_helper->apiCall($params);
        });
    }
}