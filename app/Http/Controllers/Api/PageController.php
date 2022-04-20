<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiRequestException;
use App\Http\Controllers\Controller;
use Canvas\Models\Post;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function show(string $id): JsonResponse
    {
        try {
            $ident = sprintf('page:%s', $id);
            if (!cache()->has($ident)) {
                $result = \DB::table('canvas_posts')->select(['*'])->where('id', $id)->first();

                cache()->put($ident, $result, now()->addMinutes(10));
            }

            return response()->json(cache($ident));
        } catch (InvalidArgumentException|ApiRequestException|Exception $e) {
            return response()->json(
                $e,
                $this->getErrorCode($e->getCode())
            );
        }
    }
}
