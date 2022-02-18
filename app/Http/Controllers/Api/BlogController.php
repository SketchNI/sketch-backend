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
            $posts = (new Post)->with(['tags', 'user', 'topic'])->published()->get();
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
