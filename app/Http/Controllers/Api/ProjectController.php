<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GraphQL;
use Cache;
use Exception;
use File;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Retrieve all projects from GitHub.
     *
     * @returns JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            if (!Cache::has('github')) {
                $query = File::get(base_path('graphql/github.graphql'));

                $gql = new GraphQL("https://api.github.com/graphql", config('services.github.token'));

                Cache::put('github', $gql->query($query), now()->addMinutes(10));
            }

            return response()->json(json_decode(Cache::get('github')));
        } catch (Exception $e) {
            return response()->json(json_encode($e->getMessage()), $this->getErrorCode($e->getCode()));
        }
    }
}
