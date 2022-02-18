<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class BlogController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Blog/Index');
    }

    public function show(string $topic, string $slug): Response
    {
        return Inertia::render('Blog/View', compact('topic', 'slug'));
    }
}
