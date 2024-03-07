@extends('layouts.app')
@section('title')
    Register
@endsection
@section('main')
    <div class="p-10 grid grid-cols-2">
        <div class="flex items-center justify-center">
            <img src="{{ asset('images/icon-books-regis.webp') }}" alt="Image Regis" width="400px">
        </div>
        <div class="flex flex-col items-center gap-5">
            <h1 class="font-mono underline text-2xl font-semibold">Register</h1>
            <form action="{{route('auth.register.post')}}" method="POST" enctype="multipart/form-data"
                class="w-full h-full p-2">
                @csrf
                <div class="w-full h-96 overflow-y-scroll flex flex-col gap-2">
                    <div class="flex flex-col px-2 relative">
                        <label for="username" class="text-sm text-slate-500">Username</label>
                        <input type="text" id="username" minlength="4" oninput="validasi('username', 'usernameIcon')"
                            class="input-no-space bg-transparent border-b-2 border-slate-500 outline-none pr-6" required name="username">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute bottom-0 right-1 text-green-600 hidden"
                            id="usernameIcon" width="19" height="19" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="email" class="text-sm text-slate-500 no-space">Email</label>
                        <input type="email" id="email"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6" required name="email"
                            autocomplete="off">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute bottom-0 right-1 text-green-600 hidden"
                            id="check-email" width="19" height="19" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="password" class="text-sm text-slate-500">Password</label>
                        <input type="password" id="password"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6 level-password"
                            required autocomplete="off" name="password">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute bottom-1 right-1 cursor-pointer" id="show-password"
                            width="19" height="19" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
                            <path d="M15 19l2 2l4 -4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute bottom-1 right-1 cursor-pointer hidden"
                            id="hidden-password" width="19" height="19" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M13.048 17.942a9.298 9.298 0 0 1 -1.048 .058c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a17.986 17.986 0 0 1 -1.362 1.975" />
                            <path d="M22 22l-5 -5" />
                            <path d="M17 22l5 -5" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="fullName" class="text-sm text-slate-500">Full Name</label>
                        <input type="text" id="fullName" name="fullName"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6" autocomplete="off"
                            required oninput="validasi('fullName', 'fullNameIcon')">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute bottom-0 right-1 text-green-600 hidden"
                            id="fullNameIcon" width="19" height="19" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="number" class="text-sm text-slate-500">Handphone</label>
                        <div class="w-full flex">
                            <input type="tel" name="regionNumber" value="+62"
                                class="bg-transparent border-b-2 border-slate-500 w-9" disabled>
                            <input type="tel" id="number" name="number"
                                class="bg-transparent border-b-2 border-slate-500 outline-none pr-6 w-full"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="address" class="text-sm text-slate-500">Address</label>
                        <textarea name="address" oninput="validasi('address', 'addressIcon')" id="address" cols="30" rows="2"
                            class="bg-transparent outline-none border-b-2 border-slate-500"></textarea>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute top-6 right-1 text-green-600 hidden"
                            id="addressIcon" width="19" height="19" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="picture" class="text-sm text-slate-500">Picture</label>
                        <div class="flex gap-2 items-center">
                            <input type="file" id="image-input" name="picture"
                                class="bg-transparent outline-none border-b-2 border-slate-500 py-2 w-36">
                            <div class="w-full items-center justify-center flex">
                                <img src="" alt="" class="mt-2 rounded-full border-2 hidden w-32 h-32"
                                    id="image-preview">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="roles" value="">
                    <button type="submit" class="bg-slate-600 text-slate-50 py-3 mx-2 mt-3">Register</button>
                    <div class="flex items-center mx-2 text-sm">
                        <span>
                            Ingin kembali ke-
                        </span>
                        <a href="{{ route('auth.login') }}" class="text-slate-600 underline font-mono">
                            login
                        </a>
                        <span>
                            ?
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        const validasi = (params1, params2) => {
            var input = document.getElementById(params1)
            var icon = document.getElementById(params2)
    
            if (input.value.length >= 4) {
                icon.classList.remove('hidden');
                input.classList.add('border-green-600')
                input.classList.remove('border-slate-500')
            } else {
                icon.classList.add('hidden');
                input.classList.remove('border-green-600')
                input.classList.add('border-slate-500')
            }
        }
    </script>
@endsection
