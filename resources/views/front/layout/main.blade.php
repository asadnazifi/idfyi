<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('front/styles/base/_global.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/components/header.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/components/card.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/components/Introduction.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/base/_fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('front/styles/base/responsev.css') }}">
    @stack('style')
        <title>@yield('title', 'خانه')</title>

</head>

<body>
    @include('front.partials.toast')

    @include('front.layout.header')
    @include('front.layout.nav-menu')

    @yield('content')
    @include('front.layout.footer')

</body>

</html>
