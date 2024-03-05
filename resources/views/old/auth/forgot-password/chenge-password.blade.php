@extends('layout.app')
@section('title')
    Forgot Password
@endsection
@section('preload')
    <link rel="preload" href="{{ asset('images/icon-books-forgot.png') }}">
@endsection
@section('main')
    <div class="rounded-md flex gap-2">
        <div class="h-[34rem] w-[24rem] flex justify-center items-center">
            <img src="{{ asset('images/icon-books-forgot.png') }}" alt="" class="rounded-l-md h-[16rem]">
        </div>
        <div class="font-mono flex flex-col items-center py-10 px-5 w-96">
            <div class="w-full flex gap-3 justify-center items-center">
                <img src="{{ asset('images/icon-books-regis.png') }}" alt="" class="w-10">
                <h1 class="text-2xl underline font-semibold">Forgot Password</h1>
            </div>
            <div class="h-full w-full">
                <form action="{{ route('change.password', $id) }}" method="POST"
                    class="flex flex-col justify-center w-full h-full gap-5">
                    @csrf
                    <div class="flex flex-col relative">
                        <label for="password">Password :</label>
                        <input type="password" id="password" name="password"
                            class="bg-transparent border-b-2 border-slate-500 outline-none py-1 px-2 text-sm" required>
                        <svg xmlns="http://www.w3.org/2000/svg" id="showPassword" onclick="showPassword()"
                            class="absolute bottom-1 right-0 text-red-600 cursor-pointer hidden" width="21"
                            height="21" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M13.048 17.942a9.298 9.298 0 0 1 -1.048 .058c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a17.986 17.986 0 0 1 -1.362 1.975" />
                            <path d="M22 22l-5 -5" />
                            <path d="M17 22l5 -5" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" id="hiddenPassword" onclick="showPassword()"
                            class="absolute bottom-1 right-0 text-green-600 cursor-pointer" width="21" height="21"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path
                                d="M11.102 17.957c-3.204 -.307 -5.904 -2.294 -8.102 -5.957c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6a19.5 19.5 0 0 1 -.663 1.032" />
                            <path d="M15 19l2 2l4 -4" />
                        </svg>
                    </div>
                    <button type="submit"
                        class="border-2 border-slate-600 text-slate-700 py-2 rounded-md font-semibold hover:text-slate-100 hover:bg-slate-400">
                        Send
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
