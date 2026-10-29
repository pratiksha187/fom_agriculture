<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#203f32">
    <title>@yield('title') | Foothills of Mahabaleshwar</title>
    <link rel="icon" href="{{ asset('images/foothills-favicon.svg') }}" type="image/svg+xml">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partners.css') }}">
    <script src="{{ asset('js/site.js') }}" defer></script>
    <script src="{{ asset('js/partners.js') }}" defer></script>
</head>
<body class="partner-page partner-portal">
@php($project = config('project'))
<a class="skip-link" href="#main">Skip to content</a>
@include('partials.site-header')
<main id="main">@yield('content')</main>
@include('partials.site-footer')
</body>
</html>
