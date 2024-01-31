<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/icon-books-regis.png') }}">
    <link rel="preload" href="{{ asset('images/icon-books-regis.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    @yield('preload')
    {{-- Contoh --}}
    {{-- <link rel="preload" href="" as="" crossorigin=""> --}}

    <style>
        @keyframes slideAndDisappear {
            0% {
                transform: translateX(0) scale(1);
                opacity: 1;
            }
            50% {
                transform: translateX(75%) scale(0.8);
                opacity: 0.8;
            }
            100% {
                transform: translateX(100%) scale(0);
                opacity: 0;
            }
        }

        .animate-slideAndDisappear {
            animation: slideAndDisappear 2s ease-in-out;
            /* Durasi animasi 2 detik */
        }
    </style>
</head>

<body
    class="@if (request()->routeIs('auth.login') || request()->routeIs('auth.regis')) flex items-center justify-center @endif w-screen h-screen bg-slate-100 relative max-lg:hidden ">
    @if (request()->routeIs('auth.login') || request()->routeIs('auth.regis'))
        @yield('main')
    @else
        @auth
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'officer')
                @include('layout.sidebars.admin')
                @include('layout.navbars.admin')
            @endif
        @endauth
        <div class="h-screen ml-60 pt-[4rem]">
            <main class="border-black border-2 h-full">
                @yield('main')
            </main>
        </div>
    @endif
</body>

</html>
