<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('images/icon-books-regis.png')}}">
    <link rel="preload" href="{{asset('images/icon-books-regis.png')}}">
    <script src="https://cdn.tailwindcss.com"></script>

    @yield('preload')
    {{-- Contoh --}}
    {{-- <link rel="preload" href="" as="" crossorigin=""> --}}

</head>

<body
    class="@if (Route::has('auth.login') || Route::has('auth.regis')) flex items-center justify-center @endif w-screen h-screen bg-slate-100 relative">
    @if (Route::has('login') || Route::has('register'))
        @yield('main')
    @else
        sidebar
        {{-- navbar --}}
        {{-- main --}}
    @endif
</body>

</html>
