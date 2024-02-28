@extends('layout.app')
@section('title')
    Books Detail
@endsection
@section('preload')
@endsection
@section('main')
    @include('home.dashboard')
    <div class="absolute top-[6.7rem] left-0 right-0 bottom-0 z-50 bg-slate-100 bg-opacity-40 overflow-hidden flex"
        id="booksDetail">
        <form action="{{route('dashboard')}}" method="GET" class="h-full w-4/6">
            <button type="button" class="h-full w-full bg-slate-200 bg-opacity-5"></button>
        </form>
        <div class="w-2/6 h-screen bg-slate-300 fixed right-0 top-[6.7rem] border-l border-black px-2 py-3">
            <div class="h-full overflow-y-scroll flex flex-col gap-2 pb-10">
                <a href="{{ route('dashboard') }}"
                    class="px-2 py-2 flex items-center gap-2 bg-slate-200 bg-opacity-65 rounded-md hover:bg-opacity-80 hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="20" height="20" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 7h-6l4 5l-4 5h6l4 -5z" />
                    </svg>
                    <span class="text-xs font-semibold">
                        Back to Dashboard
                    </span>
                </a>
                <div class="h-max flex flex-col items-center justify-center gap-5">
                    <div class="py-24 h-max scale-110 flex items-center">
                        <div class="h-max w-max flex items-center justify-center pt-4 scale-150">
                            <div class="relative w-44 h-60 flex pb-8">
                                <div class="w-5 rounded-tl-xl" style="background-color: #475569;" id="cover_right_color">
                                </div>
                                <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                    style="background-color: #64748B;" id="cover_color">
                                    <img src="https://i.pinimg.com/564x/0c/c1/c9/0cc1c92beccbd13d4ef2e4357e64a903.jpg"
                                        class="w-fit h-fit rounded-tr-xl border-0" alt="" id="cover_image">
                                </div>
                                <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                    style="background-color: #1E293B" id="cover_bottom_color">
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
                    </div>
                    <div class="relative -top-9 font-mono flex flex-col gap-5">
                        <div class="flex-col flex gap-1 text-center">
                            <span class="text-2xl font-bold">
                                Bran
                            </span>
                            <span class="text-xs">
                                Hanif Ramadhan
                            </span>
                        </div>
                        <div class="flex gap-3 scale-75 justify-center">
                            <div class="flex gap-1 text-yellow-400 hover:text-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-star-half-filled" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                </svg>
                            </div>
                            <span>
                                3.8
                            </span>
                        </div>
                        <div class="flex mt-5">
                            <div class="flex flex-col px-6 py-2 border-r border-slate-800">
                                <span>100</span>
                                <span class="text-xs">Page</span>
                            </div>
                            <div class="flex flex-col px-6 py-2">
                                <span>100</span>
                                <span class="text-xs">Page</span>
                            </div>
                            <div class="flex flex-col px-6 py-2 border-l border-slate-800">
                                <span>100</span>
                                <span class="text-xs">Page</span>
                            </div>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <button type="submit"
                            class="border border-slate-500 py-3 px-14 rounded-md font-semibold hover:bg-slate-400 hover:text-slate-100">
                            Add Cart
                        </button>
                    </form>
                    {{-- Comming Soon --}}
                    {{-- <div>
                    <button>
                        Comments
                    </button>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
