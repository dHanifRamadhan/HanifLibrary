@extends('layouts.app')
@section('title')
    History
@endsection
@section('main')
    <div class="py-5 px-8 h-full overflow-y-scroll">
        <div class="flex gap-5">
            <div class="flex flex-col gap-2 border border-slate-400 bg-slate-200 w-3/4 rounded-md py-4 px-4 relative">
                <h1 class="text-slate-500 font-semibold">Buy books</h1>
                <div class="flex items-center gap-5">
                    <span class="text-xs ml-5">
                        Books : 1, 2, 3
                    </span>
                    <button disabled
                        class="text-xs font-semibold bg-slate-300 bg-opacity-75 text-slate-400 py-1 px-3 border border-slate-400 rounded-lg">
                        Send
                    </button>
                    <button type="button" onclick="HistoryModal('history', 'down', 'up', 'detail')" class="absolute top-2 right-2 text-slate-600" id="history">
                        <svg xmlns="http://www.w3.org/2000/svg" class="" id="down" width="19" height="19"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 13v-6l-5 4l-5 -4v6l5 4z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="hidden" id="up" width="19" height="19"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 11v6l-5 -4l-5 4v-6l5 -4z" />
                        </svg>
                    </button>
                </div>
                <div class="hidden" id="detail">
                    <hr class="border border-slate-400 mt-3">
                    <div class="text-sm text-slate-600 grid grid-cols-2 gap-10 my-10 px-3">
                        <div class="flex flex-col">
                            <span class="text-xs font-semibold">Send to</span>
                            <h1 class="text-lg font-bold">Hanif Ramadhan</h1>
                            <p class="text-wrap text-xs mb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi odit molestiae illo
                                veritatis
                                quis, quo soluta non sit amet perferendis officiis quod ad consequuntur recusandae,
                                praesentium
                                natus minus expedita placeat.
                            </p>
                            <span class="font-bold">
                                d.haniframadhan@gmail.com
                            </span>
                            <span class="font-bold text-xs">
                                +62 896-3807-0331
                            </span>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-1">
                                <h1 class="font-bold">Trasaction Date</h1>
                                <span class="text-xs">
                                    Sabtu, 21 Oktober 2022
                                </span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h1 class="font-bold">Total Amount</h1>
                                <span class="text-xs">
                                    Rp 20.000.000,00
                                </span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h1 class="font-bold">Total Quantity</h1>
                                <span class="text-xs">
                                    200 pcs
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
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        <div class="h-max w-max flex items-center justify-center scale-50">
                                            <div class="relative w-44 h-60 flex pb-8 -my-11">
                                                <div class="w-5 rounded-tl-xl" style="background-color: #222;">
                                                </div>
                                                <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                    style="background-color: #111;">
                                                    <img src="https://i.pinimg.com/564x/b5/79/63/b5796343875e0922d17760943ddeba9e.jpg"
                                                        class="w-full h-full rounded-tr-xl border-0" alt="">
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
                                        <span class="font-semibold">
                                            The Year of Shadow
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span>
                                        Rp 20.000.000,00
                                    </span>
                                </td>
                                <td>
                                    <span class="font-semibold">
                                        100 pcs
                                    </span>
                                </td>
                            </tr>
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
    </div>
@endsection
