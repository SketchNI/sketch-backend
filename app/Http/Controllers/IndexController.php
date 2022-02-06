<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    /**
     * Render the Index page.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Index');
    }
}
