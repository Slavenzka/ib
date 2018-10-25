<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IB') . (isset($app_title) ? ' | ' . $app_title : '') }}</title>

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,400i,700,700i&amp;subset=cyrillic"
          rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicons/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('images/favicons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Impression Bureau">
    <meta name="application-name" content="Impression Bureau">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('images/favicons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
</head>
<body class="loading">
@include('partials.app.loader')
@include('partials.app.icons')

<div id="app" v-cloak>
    @include('partials.app.header')
    <main>
        @yield('content')
    </main>
    @include('partials.app.footer')
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
