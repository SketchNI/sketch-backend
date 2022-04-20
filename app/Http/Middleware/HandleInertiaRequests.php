<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Storage;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'global' => [
                'assets' => [
                    'favicon' => [
                        'chrome-192' => 'android-chrome-192x192.png',
                    ]
                ],
                'environment' => app()->environment()
            ],
        ]);
    }
}
