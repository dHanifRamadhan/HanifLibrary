@extends('layout.app')
@section('title')
    Books
@endsection
@section('preload')
@endsection
@section('main')
    <div class="mx-16 flex flex-col gap-4">
        <div class="flex gap-4">
            <a href="{{ route('book.create') }}"
                class="flex gap-3 py-2 px-4 items-center border-2 border-black rounded-md font-semibold">
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
        </div>
        <div class="grid grid-cols-1 gap-5">
            @foreach ($data as $key => $value)
                <div class="flex gap-2 border-2 border-black py-3 pt-8 px-10 rounded-md bg-slate-200">
                    <div class="h-max w-max flex items-center justify-center py-3">
                        <div class="relative w-44 h-60 flex pb-8">
                            <div class="w-5 rounded-tl-xl" style="background-color: {{ $value->cover_right_color }};"></div>
                            <div class="w-4/5 rounded-tr-xl flex items-start justify-end pb-2"
                                style="background-color: {{ $value->cover }};">
                                <img src="{{ asset('storage/' . $value->picture) }}" class="w-full h-full rounded-tr-lg"
                                    alt="">
                            </div>
                            <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                style="background-color: {{ $value->cover_bottom_color }};">
                                <div class="relative w-full h-full flex items-center pl-4 pr-1">
                                    <div
                                        class="h-4 w-full bg-slate-200 bg-opacity-90 rounded-md flex flex-col gap-[0.20rem] py-1">
                                        <hr class="border-slate-400">
                                        <hr class="border-slate-400">
                                        <hr class="border-slate-400">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-2 flex flex-col gap-3">
                        <h1 class="font-semibold text-2xl font-mono">
                            {{ $value->title }}
                        </h1>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="flex flex-col">
                                <label class="font-semibold ">Author :</label>
                                <span class="text-sm underline pl-1">
                                    {{ $value->author }}
                                </span>
                            </div>
                            <div class="flex flex-col col-span-2 text-right">
                                <span class="text-sm underline pl-1">
                                    {{ Carbon\Carbon::parse($value->year_published)->format('l, d F Y') }}
                                </span>
                            </div>
                            <div class="flex flex-col col-span-3">
                                <label class="font-semibold">Publisher :</label>
                                <span class="text-xs pl-1">
                                    {{ $value->publisher }}
                                </span>
                            </div>
                            <div class="flex flex-col col-span-2">
                                <label class="font-semibold">Category :</label>
                                <div class="mt-2 flex flex-wrap gap-1">
                                    @foreach (explode(',', $value->category) as $keyCategory => $valueCategory)
                                        <span class="text-sm py-1 px-2 border-2 border-black rounded-md pointer-events-none">
                                            {{$valueCategory}}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="text-right flex flex-col items-end">
                                <span>Available</span>
                                <div class="flex gap-1">
                                    <input type="text" value="{{$value->qty}}" id="qtyInput"
                                        class="text-right bg-transparent outline-none">
                                    <span>Pcs</span>
                                </div>
                            </div>
                            <div class="flex justify-end gap-2 px-3 col-span-3">
                                <form action="" method="POST" class="flex gap-2">
                                    <a href="{{route('book.show', $value->id)}}" class="text-yellow-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                            width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path
                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </a>
                                    <button type="submit" class="text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                            width="22" height="22" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
