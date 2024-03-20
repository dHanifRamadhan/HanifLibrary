@extends('layouts.app')
@section('title')
    Favorite
@endsection
@section('main')
    <div class="py-5 px-8 h-full overflow-y-scroll">
        <div class="flex items-center justify-center">
            <span class="text-xl font-semibold">
                There is no book that you like!
            </span>
        </div>
        {{-- <div class="grid grid-cols-3 gap-6 h-max">
            <a href="{{route('detail', 1)}}" class="border border-slate-400 rounded flex gap-2 bg-slate-200 hover:border-black">
                <div class="h-max w-max flex items-center justify-center scale-75">
                    <div class="relative w-44 h-60 flex pb-8">
                        <div class="w-5 rounded-tl-xl" style="background-color: #222;">
                        </div>
                        <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                            style="background-color: #111;">
                            <img src="https://i.pinimg.com/564x/b5/79/63/b5796343875e0922d17760943ddeba9e.jpg" class="w-full h-full rounded-tr-xl border-0" alt="">
                        </div>
                        <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                            style="background-color: #000;">
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
                    <h1 class="text-lg font-semibold">The Year of Shadow</h1>
                    <p class="text-wrap text-xs">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro ipsam ipsa doloribus delectus maiores cum enim esse est, quibusdam repellat vero et veritatis natus! Ullam culpa amet velit illo error.
                    </p>
                    <div class="flex gap-2 mt-2">
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-slate-500 font-semibold border border-slate-400 rounded-md py-2 px-5 hover:border-black hover:text-black">
                                Add Cart
                            </button>
                        </form>
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" class="text-sm text-slate-500 font-semibold border border-slate-400 rounded-md py-2 px-5 hover:border-black hover:text-black">
                                Unfavorite
                            </button>
                        </form>
                    </div>
                </div>
            </a>
        </div> --}}
    @endsection
