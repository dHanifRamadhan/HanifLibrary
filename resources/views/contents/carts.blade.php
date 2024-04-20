@extends('layouts.app')
@section('title')
    Carts
@endsection
@section('main')
    <div class="w-full h-full flex flex-col items-center gap-10 pt-20">
        <h1 class="text-2xl font-semibold underline">
            Your Cart
        </h1>
        <div class="flex gap-5">
            <div class="flex flex-col overflow-y-scroll h-[20rem]">
                <table class="text-center">
                    <thead>
                        <tr class="border-b border-slate-500 font-semibold text-slate-500">
                            <td class="px-4">Product Book</td>
                            <td class="px-4">Price</td>
                            <td class="px-4">Quantity</td>
                            <td class="px-4">Total</td>
                        </tr>
                    </thead>
                    <tbody class="">
                        @forelse ($data as $key => $value)
                            <tr class="border-b border-slate-500">
                                <td class="px-6">
                                    <div class="w-full h-full flex items-center gap-3">
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
                                        <span class="font-semibold">
                                            {{ $value->title }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6">
                                    <span class="font-semibold">
                                        {{ number_format($value->unit_price) }}
                                    </span>
                                    <span class="text-sm">
                                        Coins
                                    </span>
                                </td>
                                <td class="px-6">
                                    {{ $value->unit_qty }}
                                </td>
                                <td class="px-6">
                                    <div class="w-full h-full flex items-center justify-center gap-5">
                                        <div class="flex items-end">
                                            <span class="font-semibold">
                                                {{ number_format($value->unit_price * $value->unit_qty) }}
                                            </span>
                                            <span class="text-sm">
                                                Coins
                                            </span>
                                        </div>
                                        <form action="{{ route('carts.delete', $value->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-trash-x">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7h16" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-10 text-slate-500">
                                    Anda belum memesan barang sama sekali!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="bg-slate-300 p-10 h-max rounded-md border border-slate-700">
                <div class="p-2 py-4 grid grid-cols-3 text-sm text-slate-600 border-b border-slate-500">
                    <span>Total</span>
                    <span class="text-center">:</span>
                    <span> {{number_format($transaction->total)}} Coins</span>
                    <span>Quantity</span>
                    <span class="text-center">:</span>
                    <span> {{$transaction->total_qty}} Book</span>
                    <span>Transaction Date</span>
                    <span class="text-center">:</span>
                    <span> {{ Carbon\Carbon::now()->toDateString() }} </span>
                    <hr class="col-span-3 my-4 border-slate-500">
                    <span>Your Coins</span>
                    <span class="text-center">:</span>
                    <span> {{number_format(Auth::user()->coins)}} Coins</span>
                </div>
                <form action="{{route('transaction.store')}}" method="POST" class="flex py-4">
                    @csrf
                    <button
                        class="w-full border border-slate-700 py-2 text-sm gap-2 flex justify-center items-center rounded-md hover:bg-slate-500 hover:text-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart-copy">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M11.5 17h-5.5v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                            <path d="M15 19l2 2l4 -4" />
                        </svg>
                        <span>
                            Buy
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
