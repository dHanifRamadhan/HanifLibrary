@extends('layouts.app')
@section('title')
    History
@endsection
@section('main')
    <div class="py-5 px-8 h-full overflow-y-scroll flex flex-col gap-7">
        @forelse ($data as $key => $value)
            <div class="flex gap-5">
                <div class="flex flex-col gap-2 border border-slate-400 bg-slate-200 w-3/4 rounded-md py-4 px-4 relative">
                    <h1 class="text-slate-500 font-semibold">Buy books </h1>
                    <div class="flex items-center gap-5">
                        <span class="text-xs ml-5">
                            Books : {{ $value->book_id }}
                        </span>
                        <button disabled
                            class="text-xs font-semibold bg-slate-300 bg-opacity-75 text-slate-400 py-1 px-3 border border-slate-400 rounded-lg">
                            {{ $value->status }}
                        </button>
                        <span class="text-xs">
                            @php
                                $date = Carbon\Carbon::createFromFormat('Y-m-d', $value->transaction_date);
                            @endphp
                            NFB{{ $date->format('Ymd').$value->id }}
                        </span>
                        <button type="button"
                            onclick="HistoryModal('history{{ $value->id }}', 'down{{ $value->id }}', 'up{{ $value->id }}', 'detail{{ $value->id }}')"
                            class="absolute top-2 right-2 text-slate-600" id="history{{ $value->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="" id="down{{ $value->id }}"
                                width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 13v-6l-5 4l-5 -4v6l5 4z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="hidden" id="up{{ $value->id }}" width="19"
                                height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 11v6l-5 -4l-5 4v-6l5 -4z" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden" id="detail{{ $value->id }}">
                        <hr class="border border-slate-400 mt-3">
                        <div class="text-sm text-slate-600 grid grid-cols-2 gap-10 my-10 px-3">
                            <div class="flex flex-col">
                                <span class="text-xs font-semibold">Send to</span>
                                <h1 class="text-lg font-bold"> {{ $value->name }} </h1>
                                <p class="text-wrap text-xs mb-2">
                                    {{ $value->address }}
                                </p>
                                <span class="font-bold">
                                    {{ $value->email }}
                                </span>
                                <span class="font-bold text-xs">
                                    {{ $value->phone }}
                                </span>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="flex flex-col gap-1">
                                    <h1 class="font-bold">Trasaction Date</h1>
                                    <span class="text-xs">
                                        {{ $date->translatedFormat('l, j F Y') }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1 class="font-bold">Total Amount</h1>
                                    <span class="text-xs">
                                        Rp {{ number_format($value->total_amount) }}
                                    </span>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <h1 class="font-bold">Total Quantity</h1>
                                    <span class="text-xs">
                                        {{ $value->total_qty }} pcs
                                    </span>
                                </div>
                            </div>
                        </div>
                        <table class="w-full">
                            <thead class="bg-slate-400 text-slate-200">
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody class="text-center text-sm">
                                @php
                                    $detail = DB::table('transaction_details AS a')
                                        ->select(
                                            'a.*',
                                            'b.title',
                                            'b.cover_color',
                                            'b.right_color',
                                            'b.bottom_color',
                                            'b.picture',
                                        )
                                        ->leftJoin('books AS b', 'a.book_id', '=', 'b.id')
                                        ->where('transaction_id', $value->id)
                                        ->get();
                                @endphp
                                @forelse ($detail as $k => $v)
                                    <tr class="border-t border-slate-400">
                                        <td>
                                            <div class="flex items-center">
                                                <div class="h-max w-max flex items-center justify-center scale-50">
                                                    <div class="relative w-44 h-60 flex pb-8 -my-11">
                                                        <div class="w-5 rounded-tl-xl"
                                                            style="background-color: {{ $v->right_color }};">
                                                        </div>
                                                        <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                            style="background-color: {{ $v->cover_color }};">
                                                            <img src="{{ asset('storage/' . $v->picture) }}"
                                                                class="w-full h-full rounded-tr-xl border-0" alt="">
                                                        </div>
                                                        <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                                            style="background-color: {{ $v->bottom_color }};">
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
                                                    {{ $v->title }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span>
                                                Rp {{ $v->sub_total }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="font-semibold">
                                                {{ $v->unit_qty }} pcs
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex flex-col gap-2 border border-slate-400 bg-slate-200 w-1/4 rounded-md p-4">
                    <h1 class="font-bold text-slate-500">Package</h1>
                    <span class="text-xs text-slate-400 px-1 flex gap-5">
                        Status :
                        <button disabled class=" px-2 border border-slate-400 rounded-md font-semibold">
                            Send
                        </button>
                    </span>
                </div>
                <div></div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
