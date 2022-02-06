<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiRequestException;
use App\Http\Controllers\Controller;
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
            $ident = sprintf('wp_page:%s', $id);
            if (!cache()->has($ident)) {
                $response = Http::timeout(3)
                    ->get(sprintf("https://wp.sketchni.uk/wp-json/wp/v2/pages/%s", $id));

                if ( $response->clientError() ) {
                    throw new ApiRequestException(
                        __("Unable to connect to API."),
                        Response::HTTP_GATEWAY_TIMEOUT
                    );
                }

                $result = json_decode($response->body());

                cache()->put($ident, $result, now()->addMinutes(10));
            }

            return response()->json(cache($ident));
        } catch (InvalidArgumentException|ApiRequestException|Exception $e) {
            return response()->json(
                json_encode($e),
                $this->getErrorCode($e->getCode())
            );
        }
    }
}
