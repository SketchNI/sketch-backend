<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * Render the Project page.
     * @return Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Projects');
    }

}
