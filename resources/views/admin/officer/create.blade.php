@extends('layout.app')
@section('title')
    Register Officer
@endsection
@section('preload')
    <style>
        .animate-moveUp {
            animation: moveUp 0.5s ease-in-out;
        }

        @keyframes moveUp {
            0% {
                top: 0.75rem;
            }

            100% {
                top: -0.75rem;
            }
        }
    </style>
@endsection
@section('main')
    <div class="px-16 py-5 flex gap-5 items-center">
        <h1 class="text-3xl underline font-semibold">
            Form Register Officer
        </h1>
        <img src="{{ asset('images/icon-books-regis.png') }}" alt="" class="w-12">
    </div>
    <div class="px-16 py-3">
        <form action="{{route('officer.store')}}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-5">
            @csrf
            <div class="flex flex-col gap-1 relative">
                <label for="username" id="lu"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">Username</label>
                <input type="text" name="username" id="username" onclick="Animasi('lu', 'username')"
                    class="px-5 py-2 rounded-md outline-none border-2 border-black bg-transparent text-sm pr-9" required
                    autocomplete="off">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="cs" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 relative">
                <label for="email" id="le"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">Email</label>
                <input type="email" name="email" id="email" onclick="Animasi('le')"
                    class="px-5 py-2 rounded-md outline-none border-2 border-black bg-transparent text-sm pr-9" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="ce" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 relative">
                <label for="firstName" id="lfn"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">First
                    Name</label>
                <input type="text" name="firstName" id="firstName" onclick="Animasi('lfn', 'firstName')" required
                    class="px-5 py-2 rounded-md outline-none border-2 border-black bg-transparent text-sm pr-9">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="cfn" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex flex-col gap-1 relative">
                <label for="lastName" id="lln"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">Last
                    Name</label>
                <input type="text" name="lastName" id="lastName" onclick="Animasi('lln', 'lastName')" required
                    class="px-5 py-2 rounded-md outline-none border-2 border-black bg-transparent text-sm pr-9">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="cln" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex col-span-2 relative">
                <label for="number" id="ln"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">Phone
                    Number</label>
                <input type="text" id="region" value="+62"
                    class="w-[3.8rem] border-y-2 border-l-2 border-black rounded-l-md pl-5 pr-2 py-2" disabled>
                <input type="tel" name="number" id="number" onclick="Animasi('ln', 'number')"
                    class="w-full px-5 py-2 rounded-r-md outline-none border-y-2 border-r-2 border-black bg-transparent text-sm pr-9"
                    required autocomplete="off">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="cn" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex col-span-2 relative">
                <label for="address" id="la"
                    class="text-sm text-slate-800 font-semibold bg-slate-100 absolute top-[0.55rem] left-4 px-1 py-0">Address</label>
                <textarea name="address" id="address" onclick="Animasi('la', 'address')"
                    class="w-full bg-transparent outline-none border-2 border-black rounded-md text-sm px-5 py-2" rows="2"></textarea>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-[0.55rem] right-3 text-green-400 hidden"
                    id="ca" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l5 5l10 -10" />
                </svg>
            </div>
            <div class="flex col-span-2 relative gap-6">
                <input type="file" name="image" id="image"
                    class="w-full px-5 py-2 rounded-md outline-none border-y-2 border-2 border-black bg-transparent text-sm pr-9">
                <div class="items-center justify-center hidden" id="divP">
                    <img src="" alt="" class="rounded-full w-20 h-20 border-2 border-black hidden"
                        id="preview">
                </div>
            </div>
            <div class="flex col-span-2 relative gap-10">
                <a href="{{route("officer.index")}}"
                    class="bg-slate-200 flex items-center justify-center border-2 border-black w-full gap-4 font-semibold rounded-md py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                    </svg>
                    <span>
                        Back
                    </span>
                </a>
                <button type="submit" class="bg-slate-400 w-full py-2 border-2 border-black rounded-md flex items-center justify-center gap-4 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-forward"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 11l4 4l-4 4m4 -4h-11a4 4 0 0 1 0 -8h1" />
                    </svg>
                    <span>
                        Save
                    </span>
                </button>
            </div>
        </form>
    </div>
    <script>
        function Animasi(label) {
            var label = document.getElementById(label)

            label.classList.remove('top-[0.55rem]')
            label.classList.add('animate-moveUp')
            label.classList.add('-top-[0.55rem]');
        }

        document.getElementById('username').addEventListener('input', function() {
            var input = document.getElementById('username')
            var check = document.getElementById('cs')
            var label = document.getElementById('lu')

            input.value = input.value.replace(/\s/g, '')
            if (input.value.length > 4) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        document.getElementById('email').addEventListener('input', function() {
            var input = document.getElementById('email')
            var label = document.getElementById('le')
            var check = document.getElementById('ce')

            input.value = input.value.toLowerCase()
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(input.value)) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        document.getElementById('firstName').addEventListener('input', function() {
            var input = document.getElementById('firstName')
            var check = document.getElementById('cfn')
            var label = document.getElementById('lfn')

            if (input.value.length > 4) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        document.getElementById('lastName').addEventListener('input', function() {
            var input = document.getElementById('lastName')
            var check = document.getElementById('cln')
            var label = document.getElementById('lln')

            if (input.value.length > 4) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        var maxLength = 12;

        document.getElementById('number').addEventListener('input', function(event) {
            var check = document.getElementById('cn')
            var label = document.getElementById('ln')
            var region = document.getElementById('region')
            var input = event.target;
            var inputValue = input.value;

            var cleaned = inputValue.replace(/\D/g, '');
            var formatted = cleaned.slice(0, 3) + '-' + cleaned.slice(3, 7) + '-' + cleaned.slice(7, maxLength);
            input.value = formatted;

            if (input.value.length > 12) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                region.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                region.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        document.getElementById('address').addEventListener('input', function() {
            var check = document.getElementById('ca')
            var label = document.getElementById('la')
            var input = document.getElementById('address')

            if (input.value.length > 10) {
                check.classList.remove('hidden')
                input.classList.add('border-green-500')
                label.classList.add('text-green-500')
            } else {
                check.classList.add('hidden')
                input.classList.remove('border-green-500')
                label.classList.remove('text-green-500')
            }
        })

        document.getElementById('image').addEventListener('input', function() {
            var preview = document.getElementById('preview');
            var fileInput = document.getElementById('image');
            var divP = document.getElementById('divP')
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();
                reader.onloadend = function() {
                    preview.src = reader.result;
                    preview.classList.add('flex'); // Set display to 'block' when file is selected
                    preview.classList.remove('hidden');
                    divP.classList.remove('hidden');
                    divP.classList.add('flex')
                    fileInput.classList.add('border-green-500')
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden') // Hide the image when no file is selected
                preview.classList.remove('flex');
                divP.classList.remove('flex');
                divP.classList.add('hidden')
                fileInput.classList.remove('border-green-500')
            }
        })
    </script>
@endsection
