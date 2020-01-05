<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-{{ config('theme.themes')[array_rand(config('theme.themes'))] }} bg-primary-500">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <title>@hasSection('title') @yield('title') - @endif {{ config('app.name') }}</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
        <link rel="icon" href="/favicon.png">

        @routes
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </head>
    <body>
        @inertia
    </body>
</html>
