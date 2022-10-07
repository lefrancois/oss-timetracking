<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('/favicon.png') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ __('Easy to use and integrate time tracking for everybody. No restrictions, no strings attached.') }}">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
        <meta property="og:description" content="{{ __('Easy to use and integrate time tracking for everybody. No restrictions, no strings attached.') }}" />
        <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}" />
        <meta property="og:image" content="{{ url(asset('assets/images/hero-preview.png')) }}" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta property="og:type" content="website" />
        <meta name="twitter:title" content="{{ config('app.name', 'Laravel') }}" />
        <meta name="twitter:description" content="{{ __('Easy to use and integrate time tracking for everybody. No restrictions, no strings attached.') }}" />
        <meta name="twitter:url" content="{{ URL::current() }}" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:image" content="{{ url(asset('assets/images/hero-preview.png')) }}" />
        <link rel="canonical" href="{{ URL::current() }}"/>
        <meta name="robots" content="index,follow" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @if (config('app.env') == 'production')
            <!-- Fathom - beautiful, simple website analytics -->
            <script src="https://cdn.usefathom.com/script.js" data-site="YEJMLZUU" defer></script>
            <!-- / Fathom -->
        @endif
    </head>
    <body class="font-sans antialiased bg-gray-100">
        @yield('page')
        @livewireScripts
    </body>
</html>
