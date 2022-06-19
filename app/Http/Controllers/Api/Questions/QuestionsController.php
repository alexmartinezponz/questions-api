<?php

namespace App\Http\Controllers\Api\Questions;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetDataRequest;
use App\Repositories\ApiCacheRepository;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    private $cache_repository;

    /**
     * @param ApiCacheRepository $apiCacheRepository
     */
    function __construct(ApiCacheRepository $apiCacheRepository)
    {
        $this->cache_repository = $apiCacheRepository;
    }

    /**
     * @param GetDataRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(GetDataRequest $request)
    {
        try {

            return $this->respondWithData('', $this->cache_repository->getDataCached($request->all()), true);

        } catch (\Exception $e) {

            return $this->respondWithData($e->getMessage(), [], false);
        }

    }
}
