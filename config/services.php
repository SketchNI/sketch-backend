<?php

return [
    'contentful' => [
        'access_token' => env('CONTENTFUL_ACCESS_TOKEN'),
        'preview_access_token' => env('CONTENTFUL_PREVIEW_ACCESS_TOKEN'),
        'environment' => env('CONTENTFUL_ENV'),
        'space' => env('CONTENTFUL_SPACE_ID'),
        'api_url' => env('CONTENTFUL_API_URL', 'https://cdn.contentful.com')
    ],

    'github' => [
        'token' => env('GITHUB_TOKEN'),
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
    ],

    'backend' => env('BACKEND_TOKEN'),
];
