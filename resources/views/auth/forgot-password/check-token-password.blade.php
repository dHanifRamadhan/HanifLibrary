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
                <form action="{{ route('verified-token.password', $id) }}" method="POST"
                    class="flex flex-col justify-center w-full h-full gap-5">
                    @csrf
                    <div class="flex flex-col relative">
                        <label for="code">Code :</label>
                        <input type="text" id="code" name="code"
                            class="bg-transparent border-b-2 border-ye-500 outline-none py-1 px-2 text-sm" required autocomplete="off">
                        <svg xmlns="http://www.w3.org/2000/svg" id="check"
                            class="hidden absolute bottom-0 right-0 text-green-500" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l5 5l10 -10" />
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
