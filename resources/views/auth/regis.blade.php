@extends('layout.app')
@section('title')
    Register
@endsection
@section('preload')
    <style>
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
@endsection
@section('main')
    @if (session('message') && session('warning'))
        <div class="absolute top-12 right-0 left-0 flex justify-center fadeInDown" id="session">
            <div
                class="p-10 bg-slate-600 rounded-md font-mono text-slate-50 flex flex-col justify-center items-center relative">
                <h1 class="text-xl">{{session('message')}}</h1>
                <p class="text-center text-sm mt-5 w-48">
                    {{session('warning')}}
                </p>
                <button class="absolute top-4 right-4" type="button" onclick="cardSession()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M18 6l-12 12" />
                        <path d="M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif
    <div class="p-10 grid grid-cols-2">
        <div class="flex items-center justify-center">
            <img src="{{ asset('images/icon-books-regis.png') }}" alt="Image Regis" width="400px">
        </div>
        <div class="flex flex-col items-center gap-5">
            <h1 class="font-mono underline text-2xl font-semibold">Register</h1>
            <form action="" method="POST" enctype="multipart/form-data" class="w-full h-full p-2">
                @csrf
                <div class="w-full h-96 overflow-y-scroll flex flex-col gap-2">
                    <div class="flex flex-col px-2 relative">
                        <label for="username" class="text-sm text-slate-500">Username</label>
                        <input type="text" id="username" minlength="4" oninput="validasi('username', 'usernameIcon')"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6" required name="username">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute bottom-0 right-1 text-green-600 hidden"
                            id="usernameIcon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="email" class="text-sm text-slate-500">Email</label>
                        <input type="email" id="email" oninput="validateEmail()"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6" required name="email"
                            autocomplete="off">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute bottom-0 right-1 text-green-600 hidden"
                            id="check" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-x text-red-600 absolute right-1 bottom-0 hidden"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            id="cross" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M18 6l-12 12" />
                            <path d="M6 6l12 12" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="password" class="text-sm text-slate-500">Password</label>
                        <input type="password" id="password" oninput="validasiPassword()"
                            class="bg-transparent border-b-2 border-slate-500 outline-none pr-6" required autocomplete="off"
                            name="password">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-eye-check absolute bottom-1 right-1 hidden" id="show"
                            width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            onclick="showPassword()" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
                            <path d="M15 19l2 2l4 -4" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-eye-x absolute bottom-1 right-1 cursor-pointer"
                            id="hidden" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" onclick="showPassword()" fill="none" stroke-linecap="round"
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
                            id="fullNameIcon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
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
                                oninput="handphone(event)" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="address" class="text-sm text-slate-500">Address</label>
                        <textarea name="address" oninput="validasi('address', 'addressIcon')" id="address" cols="30" rows="2"
                            class="bg-transparent outline-none border-b-2 border-slate-500"></textarea>
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-check absolute top-6 right-1 text-green-600 hidden"
                            id="addressIcon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
                        </svg>
                    </div>
                    <div class="flex flex-col px-2 relative">
                        <label for="picture" class="text-sm text-slate-500">Picture</label>
                        <div class="flex gap-2 items-center">
                            <input type="file" id="picture" name="picture" oninput="previewImage()"
                                class="bg-transparent outline-none border-b-2 border-slate-500 py-2 w-36">
                            <div class="w-full items-center justify-center flex">
                                <img src="" alt="" class="mt-2 rounded-full border-2 hidden"
                                    id="preview" width="120">
                            </div>
                        </div>
                    </div>
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
        function validasi(params1, params2) {
            var input = document.getElementById(params1)
            var icon = document.getElementById(params2)

            if (input.value.length >= 4) {
                icon.classList.remove('hidden');
                input.classList.add('border-green-600')
            } else {
                icon.classList.add('hidden');
                input.classList.remove('border-green-600')
            }
        }

        function validateEmail() {
            var email = document.getElementById('email');
            var check = document.getElementById('check');
            var cross = document.getElementById('cross');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            email.value = email.value.toLowerCase();

            if (emailRegex.test(email.value)) {
                check.classList.remove('hidden');
                cross.classList.add('hidden');
                email.classList.add('border-green-600')
                email.classList.remove('border-red-600')
            } else {
                check.classList.add('hidden');
                cross.classList.remove('hidden');
                email.classList.remove("border-green-600")
                email.classList.add("border-red-600")
            }
        }

        function validasiPassword() {
            var password = document.getElementById('password')

            if (password.value.length < 6) {
                password.classList.add('border-red-600');
                password.classList.remove('border-yellow-600');
                password.classList.remove('border-green-600');
            } else if (password.value.length >= 6 && password.value.length < 12) {
                password.classList.remove('border-red-600');
                password.classList.add('border-yellow-600');
                password.classList.remove('border-green-600');
            } else {
                password.classList.remove('border-red-600');
                password.classList.remove('border-yellow-600');
                password.classList.add('border-green-600');
            }
        }

        function showPassword() {
            var password = document.getElementById('password');
            var show = document.getElementById('show');
            var hidden = document.getElementById('hidden');

            if (password.type === 'password') {
                password.type = 'text';
                show.classList.remove('hidden');
                hidden.classList.add('hidden');
            } else {
                password.type = 'password';
                show.classList.add('hidden');
                hidden.classList.remove('hidden');
            }
        }

        var maxLength = 12;

        // Tambahkan event listener ke input
        document.getElementById('number').addEventListener('input', function(event) {
            var input = event.target;
            var inputValue = input.value;

            // Hapus karakter selain digit
            var cleaned = inputValue.replace(/\D/g, '');

            // Format nomor handphone dengan menambahkan tanda hubung
            var formatted = cleaned.slice(0, 3) + '-' + cleaned.slice(3, 7) + '-' + cleaned.slice(7, maxLength);

            // Terapkan format ke dalam input
            input.value = formatted;
        });

        function previewImage() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('picture');
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.classList.add('flex'); // Set display to 'block' when file is selected
                    preview.classList.remove('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden') // Hide the image when no file is selected
                preview.classList.remove('flex');
            }
        }

        document.getElementById('username').addEventListener('input', function(event) {
            this.value = this.value.replace(/\s/g, '')
        })

        function cardSession() {
            var close = document.getElementById('session');
            close.classList.remove('fadeInDown');
            close.classList.add('hidden');
        }
    </script>
@endsection
