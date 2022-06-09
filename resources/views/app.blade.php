<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-zinc-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#9f00a7">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="SketchNI Personal Website" />
    <link nonce="{{ csp_nonce() }}" rel="preconnect" href="https://fonts.googleapis.com">
    <link nonce="{{ csp_nonce() }}" rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link nonce="{{ csp_nonce() }}" rel="preconnect" as="image" href="/images/sketchni.png">
    <link nonce="{{ csp_nonce() }}"
        href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300;400;500;600;700&family=Work+Sans:wght@300;400;500;600;700&family=Source+Serif+Pro:wght@400;600&display=swap"
        rel="stylesheet">
    <link nonce="{{ csp_nonce() }}" rel="stylesheet" href="{{ mix('css/app.css') }}">
    @routes(null, csp_nonce())
    @inertiaHead
    <script nonce="{{ csp_nonce() }}" src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased h-full">
    @inertia
</body>
</html>
