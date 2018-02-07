<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/code-01-CSS.css') }}">
    @yield('styles')
</head>
<body>
@include('includes.header')
<div class="main">
    @yield('content')
</div>
</body>
</html>