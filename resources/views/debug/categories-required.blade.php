@extends('layout.app')
@section('title')
    Categories Required
@endsection
@section('main')
    <div class="mx-16 h-full flex flex-col gap-3 items-center justify-center">
        <span class="text-2xl font-semibold">
            There is no data categories !!
        </span>
        <span class="underline">
            Please create category data first, have at least more than 2 data values
        </span>
        <a href="{{ route('category') }}"
            class="border-2 border-black rounded-md px-5 py-2 font-semibold hover:text-white hover:bg-slate-400">
            To Category
        </a>
    </div>
@endsection
