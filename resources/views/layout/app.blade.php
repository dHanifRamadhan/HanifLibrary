<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/icon-books-login.png') }}">
    <link rel="preload" href="{{ asset('images/icon-books-login.png') }}" as="">
    @vite('resources/css/app.css')

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

        .overflow-y-scroll::-webkit-scrollbar {
            width: 0px;
            /* Safari dan Chrome */
        }

        .overflow-y-scroll::-webkit-scrollbar-thumb {
            background-color: #aaa;
            /* Warna thumb scrollbar */
        }

        .overflow-y-scroll::-webkit-scrollbar-track {
            background-color: #eee;
            /* Warna track scrollbar */
        }

        @keyframes fadeInDown {
            from {
                transform: translateY(-40px);
            }

            to {
                transform: translateY(0);
            }
        }

        .fadeInDown {
            animation: fadeInDown 0.5s ease-out;
        }
    </style>
</head>

<body @class([
    'w-screen h-screen bg-slate-100 relative max-lg:hidden z-10',
    'flex items-center justify-center' =>
        Route::is('login') || Route::is('register') || Route::is('*.password'),
])>
    @if (session('success') || session('error'))
        <div class="w-screen h-screen bg-slate-200 bg-opacity-45 absolute top-0 z-50" id="modalSession">
            <div class="h-screen relative flex justify-center">
                <div @class([
                    'absolute rounded-md top-0 mt-14 bg-slate-200 border-2',
                    'border-green-600' => session('success'),
                    'border-red-600' => session('error'),
                ])>
                    <div class="relative py-4 px-10 flex flex-col w-[24rem] gap-2">
                        <h1 class="text-center font-semibold text-lg"> {{ session('success') ? session('success')->title : session('error')->title }} </h1>
                        <span class="text-center text-sm">
                            {{ session('success') ? session('success')->message : session('error')->message }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute top-[0.5rem] right-[0.5rem] cursor-pointer" width="19" height="19"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" id="closeSession">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 21a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9a9 9 0 0 0 -9 9a9 9 0 0 0 9 9z" />
                            <path d="M9 8l6 8" />
                            <path d="M15 8l-6 8" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (Route::is('login') || Route::is('register') || Route::is('*.password'))
        @yield('main')
    @else
        @auth
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'officer')
                @include('layout.sidebars.admin')
                @include('layout.navbars.admin')
                <div class="h-screen ml-60 pt-[4rem]">
                    <main class="border-black border-t-2 border-l-2 h-full overflow-y-scroll py-10">
                        @yield('main')
                    </main>
                </div>
            @endif
        @endauth
        {{-- <div class="h-screen ml-60 pt-[4rem]">
                @yield('main')
            </div> --}}
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
