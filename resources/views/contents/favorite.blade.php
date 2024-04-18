@extends('layouts.app')
@section('title')
    Favorite
@endsection
@section('main')
    <div class="py-5 px-8 h-full overflow-y-scroll">
        <div @class([
            'grid grid-cols-3 gap-6 h-max' => count($data) != 0,
            'flex items-center justify-center' => count($data) == 0,
        ])>
            @forelse ($data as $key => $value)
                <a href="{{ route('detail', $value->book_id) }}"
                    class="border border-slate-400 rounded flex gap-2 bg-slate-200 hover:border-black">
                    <div class="h-max w-max flex items-center justify-center scale-75">
                        <div class="relative w-44 h-60 flex pb-8">
                            <div class="w-5 rounded-tl-xl" style="background-color: {{$value->right_color}};">
                            </div>
                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                style="background-color: {{$value->cover_color}};">
                                <img src="{{asset('storage/'.$value->picture)}}"
                                    class="w-full h-full rounded-tr-xl border-0" alt="">
                            </div>
                            <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                style="background-color: {{$value->bottom_color}};">
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
                    <div class="w-full py-5 px-7 flex flex-col gap-4">
                        <h1 class="text-lg font-semibold">
                            {{$value->title}}
                        </h1>
                        <p class="text-wrap text-xs">
                            {{$value->synopsis}}
                        </p>
                        <div class="flex gap-2 mt-2">
                            <form action="" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-sm text-slate-500 font-semibold border border-slate-400 rounded-md py-2 px-5 hover:border-black hover:text-black">
                                    Add Cart
                                </button>
                            </form>
                            <form action="{{route('fav.store', $value->book_id)}}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="text-sm text-slate-500 font-semibold border border-slate-400 rounded-md py-2 px-5 hover:border-black hover:text-black">
                                    Unfavorite
                                </button>
                            </form>
                        </div>
                    </div>
                </a>
            @empty
                <span class="text-xl font-semibold">
                    There is no book that you like!
                </span>
            @endforelse
        </div>
    </div>
@endsection
