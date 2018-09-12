<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="Description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title data-locale="header_meta_title">@yield('title')</title>
    @yield('css')
</head>
<body>
@yield('body')
@yield('js')
</body>
</html>