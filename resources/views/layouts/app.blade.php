<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/icon-books-login.webp') }}">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preload" href="{{ asset('js/app.js') }}" as="script">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="preload" href="{{ asset('images/doodles-landscape.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/doodles.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/icon-book.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/icon-books-forgot.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/icon-books-login.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/icon-books-regis.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/icon-email.webp') }}" as="image" type="image/webp">
</head>

<body @class([
    'max-lg:hidden z-0 w-screen h-screen bg-slate-300 bg-opacity-30 overflow-hidden relative',
    'flex items-center justify-center' =>
        Auth::check() != true && Route::is('auth.*'),
])>

    <img src="{{ asset('images/doodles-landscape.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/doodles.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/icon-book.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/icon-books-forgot.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/icon-books-login.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/icon-books-regis.webp') }}" alt="" class="hidden">
    <img src="{{ asset('images/icon-email.webp') }}" alt="" class="hidden">

    {{-- All Sesssion --}}
    @if (session('success') || session('error'))
        <div class="py-2 px-5 absolute bottom-3 right-3 flex flex-col items-end z-10" id="sessionModal">
            <button type="button" id="closeSession" @class([
                'animate__animated animate__fadeInUp w-max p-4 mb-4 text-xs text-wrap rounded-lg border',
                'text-red-800 bg-red-50 border-red-500' => session('error'),
                'text-green-800 bg-green-100 border-green-500' => session('success'),
            ])>
                <span class="font-medium">
                    {{ session('success') ? 'Success' : 'Error' }} alert!
                </span>
                <span>
                    @if (session('success'))
                        {{ session('success')->message }}
                    @elseif (session('error'))
                        {{ session('error')->message }}
                    @endif
                </span>
            </button>
        </div>
    @endif
    {{-- All Sesssion --}}

    @if (!Route::is('auth.*'))
        @guest
            @include('layouts.navbars.guest')
        @else
            @if (Auth::user()->role != 'librarian')
                @include('layouts.navbars.admin')
                @include('layouts.sidebars.admin')
            @else
                @include('layouts.navbars.guest')
            @endif
        @endguest
        <main @class(['w-full h-full', 'pt-[6.72rem]' => Auth::check() != true || Auth::user()->role == 'librarian'])>
            @yield('main')
        </main>
    @else
        @yield('main')
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
