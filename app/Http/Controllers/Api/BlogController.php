<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Canvas\Models\Post;
use Carbon\Carbon;
use Exception;
use Psr\SimpleCache\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class BlogController extends Controller
{
    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function index()
    {
        if (!cache()->has('blog_posts')) {
            $posts = (new Post)->with(['tags', 'user', 'topic'])
                ->whereNot('id', '41d5f702-eda2-4c9d-b455-e6808309aa08')
                ->whereNot('id', '4b1640ca-c4cb-4936-8726-bc5713e5cbc3')
                ->whereNot('id', 'df51111a-c830-463d-a5cd-6b5a6d9a7a72')
                ->published()
                ->get();
            cache()->put('blog_posts', $posts, Carbon::now()->addMinute());
        }

        return response()->json(['posts' => cache('blog_posts')], HttpResponse::HTTP_OK);
    }

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function show(string $topic, string $slug)
    {
        $name = sprintf('blog_post:%s', $slug);
        if (!cache()->has($name)) {
            $post = (new Post)->with(['tags', 'user', 'topic'])->firstWhere('slug', $slug)->toArray();
            cache()->put($name, $post, Carbon::now()->addMinute());
        }

        return response()->json(['post' => cache($name)], HttpResponse::HTTP_OK);
    }
}
