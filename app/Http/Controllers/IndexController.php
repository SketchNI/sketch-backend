<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class IndexController extends Controller
{
    /**
     * Render the Index page.
     *
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Index');
    }
}
