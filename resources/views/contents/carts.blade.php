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
            <div class="flex flex-col overflow-y-scroll h-[23rem]">
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
                        <tr class="border-b border-slate-500">
                            <td class="px-6">
                                <div class="w-full h-full flex items-center gap-3">
                                    <div class="h-max w-max flex items-center justify-center scale-75">
                                        <div class="relative w-44 h-60 flex pb-8">
                                            <div class="w-5 rounded-tl-xl" style="background-color: #111;">
                                            </div>
                                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                style="background-color: #222;">
                                                <img src="https://i.pinimg.com/564x/18/af/7c/18af7c3fcadc1e851d39708fa8038c64.jpg"
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
                                        Waves
                                    </span>
                                </div>
                            </td>
                            <td class="px-6">
                                100.000 Coins
                            </td>
                            <td class="px-6">
                                1
                            </td>
                            <td class="px-6">
                                <div class="w-full h-full flex items-center justify-center gap-5">
                                    <span>
                                        100.000 Coins
                                    </span>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                        <tr class="border-b border-slate-500">
                            <td class="px-6">
                                <div class="w-full h-full flex items-center gap-3">
                                    <div class="h-max w-max flex items-center justify-center scale-75">
                                        <div class="relative w-44 h-60 flex pb-8">
                                            <div class="w-5 rounded-tl-xl" style="background-color: #111;">
                                            </div>
                                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                style="background-color: #222;">
                                                <img src="https://i.pinimg.com/564x/18/af/7c/18af7c3fcadc1e851d39708fa8038c64.jpg"
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
                                        Waves
                                    </span>
                                </div>
                            </td>
                            <td class="px-6">
                                100.000 Coins
                            </td>
                            <td class="px-6">
                                1
                            </td>
                            <td class="px-6">
                                <div class="w-full h-full flex items-center justify-center gap-5">
                                    <span>
                                        100.000 Coins
                                    </span>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                        <tr class="border-b border-slate-500">
                            <td class="px-6">
                                <div class="w-full h-full flex items-center gap-3">
                                    <div class="h-max w-max flex items-center justify-center scale-75">
                                        <div class="relative w-44 h-60 flex pb-8">
                                            <div class="w-5 rounded-tl-xl" style="background-color: #111;">
                                            </div>
                                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                style="background-color: #222;">
                                                <img src="https://i.pinimg.com/564x/18/af/7c/18af7c3fcadc1e851d39708fa8038c64.jpg"
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
                                        Waves
                                    </span>
                                </div>
                            </td>
                            <td class="px-6">
                                100.000 Coins
                            </td>
                            <td class="px-6">
                                1
                            </td>
                            <td class="px-6">
                                <div class="w-full h-full flex items-center justify-center gap-5">
                                    <span>
                                        100.000 Coins
                                    </span>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                        <tr class="border-b border-slate-500">
                            <td class="px-6">
                                <div class="w-full h-full flex items-center gap-3">
                                    <div class="h-max w-max flex items-center justify-center scale-75">
                                        <div class="relative w-44 h-60 flex pb-8">
                                            <div class="w-5 rounded-tl-xl" style="background-color: #111;">
                                            </div>
                                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                                style="background-color: #222;">
                                                <img src="https://i.pinimg.com/564x/18/af/7c/18af7c3fcadc1e851d39708fa8038c64.jpg"
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
                                        Waves
                                    </span>
                                </div>
                            </td>
                            <td class="px-6">
                                100.000 Coins
                            </td>
                            <td class="px-6">
                                1
                            </td>
                            <td class="px-6">
                                <div class="w-full h-full flex items-center justify-center gap-5">
                                    <span>
                                        100.000 Coins
                                    </span>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
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
                    </tbody>
                </table>
            </div>
            <div class="bg-slate-300 p-10 h-max rounded-md">

            </div>
        </div>
    </div>
@endsection
