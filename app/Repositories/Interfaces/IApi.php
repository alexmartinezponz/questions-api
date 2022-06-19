<?php

namespace App\Repositories\Interfaces;

interface IApi
{
    public function getDataCached(array $params);
}