<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ToolController extends Controller
{
    /**
     * Render the Tool page.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return Inertia::render('Tools', ['tools' => 0]);
    }

}
