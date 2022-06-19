<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IApi;
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
        return Cache::tags($this->prefixTag)->remember("{$this->prefixTag}.get.{$params['tagged']}", $this->timeCache, function () use ($params) {
            return $this->api_helper->apiCall($params);
        });
    }
}