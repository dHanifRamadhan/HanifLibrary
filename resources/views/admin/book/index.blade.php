@extends('layout.app')
@section('title')
    Books
@endsection
@section('preload')
    @foreach ($data as $gambar)
        <link rel="preload" href="{{ asset('storage/' . $gambar->picture) }}" as="{{ $gambar->title }}">
    @endforeach
@endsection
@section('main')
    <div class="mx-16 flex flex-col gap-4">
        <div class="flex gap-4 relative">
            <a href="{{ route('book.create') }}"
                class="flex gap-3 py-2 px-4 items-center border-2 border-black rounded-md font-semibold bg-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                <span>
                    Create
                </span>
            </a>
            <a href="{{ route('book.index') }}"
                class="flex items-center justify-center w-max gap-3 font-semibold bg-slate-200 py-1 px-3 border-2 border-black rounded-md text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back" width="17"
                    height="17" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                </svg>
                <span>
                    Back
                </span>
            </a>
            <form action="{{ route('book.index') }}" method="GET" class="flex absolute top-0 bottom-0 right-0">
                <input type="search" name="search" id="search" placeholder="Search"
                    class="bg-transparent outline-none rounded-l-md border-t-2 border-b-2 border-l-2 border-black px-2">
                <button type="submit" class="border-2 border-black px-2 rounded-r-md hover:bg-slate-400 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </button>
            </form>
        </div>
        @if ($mode == 'default')
            @include('admin.book.card-index')
        @else
            @include('admin.book.table-index')
        @endif
    </div>
@endsection
