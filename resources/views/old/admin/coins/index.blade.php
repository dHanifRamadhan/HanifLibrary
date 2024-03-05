@extends('layout.app')
@section('title')
    Coins
@endsection
@section('preload')
@endsection
@section('main')
    <div class="py-2 mx-16 flex flex-col gap-5">
        <div class="flex gap-5">
            <button type="button" id="create"
                class="hover:bg-slate-400 hover:text-slate-50 border border-black py-1 px-2 flex items-center gap-2 scale-90 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                </svg>
                <span class="font-semibold">
                    Create
                </span>
            </button>
            <a href=""
                class="flex items-center border border-black rounded-md py-1 px-2 scale-90 hover:bg-slate-400 gap-2 hover:text-slate-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin" width="19" height="19"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                <span class="font-semibold">
                    Refresh
                </span>
            </a>
        </div>
        <div class="grid grid-cols-4 gap-4" id="refresh">
            @foreach ($data as $key => $value)
                <div
                    class="flex items-center justify-center flex-col bg-slate-200 py-5 gap-4 rounded-md border border-black">
                    <img src="{{ asset('storage/' . $value->picture) }}" alt="" class="w-40 h-40 rounded-md">
                    <div class="flex gap-2 items-end text-yellow-400">
                        <span class="font-semibold">
                            {{ $value->qty }}
                        </span>
                        <span class="text-xs pb-[0.18rem] underline">
                            Coins
                        </span>
                    </div>
                    <span id="moneyIndonesia">
                        {{ $value->price }}
                    </span>
                    <form action="{{ route('coin.delete', $value->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border border-red-400 bg-red-500 text-slate-50 px-8 py-1 rounded-md">
                            Deleted
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    @include('admin.coins.create')
@endsection
