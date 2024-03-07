@extends('layouts.app')
@section('title')
    Detail Books
@endsection
@section('main')
    <div class="h-full grid grid-cols-6 overflow-hidden">
        <div class="flex items-end bg-slate-600 bg-opacity-30 relative">
            <a href="" class="absolute top-2 left-0 right-0 flex items-center px-2 gap-2 font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="32" height="32" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M11 17h6l-4 -5l4 -5h-6l-4 5z" />
                </svg>
                <span class="text-sm">
                    Dashboard
                </span>
            </a>
            <img src="{{ asset('images/doodles.webp') }}" alt="">
        </div>
        <div class="bg-slate-400 bg-opacity-30 border-l border-black col-span-5 relative">
            <div class="absolute top-0 -left-20 h-full flex items-center">
                <div class="p-4 bg-slate-300 rounded-md border border-black shadow-2xl">
                    <img src="https://i.pinimg.com/564x/d3/4d/c1/d34dc16977d5a06b31fa0316e6a574f0.jpg" alt=""
                        width="" class="w-60">
                </div>
            </div>
            <div class="ml-64 h-full relative">
                <nav class="absolute top-0 left-0 right-0 py-3 px-28 flex justify-between text-lg font-semibold">
                    <button class="border-black py-2 px-3 border-b" id="info">
                        Info
                    </button>
                    <button class="border-black py-2 px-3 text-slate-400" id="comments">
                        Comments
                    </button>
                    <button class="border-black py-2 px-3 text-slate-400" id="description">
                        Desciption
                    </button>
                </nav>
                <div class="h-full pt-[4.3rem] px-28">
                    {{-- info --}}
                    <main id="infoBook" class="py-3 flex flex-col gap-4">
                        <span class="text-xs font-semibold text-slate-500">
                            {{ $data->year_published }}
                        </span>
                        <h1 class="text-3xl font-semibold">
                            {{ $data->title }}
                        </h1>
                        <span class="text-md font-semibold text-slate-400">
                            {{ $data->author }}
                        </span>
                        <div class="flex gap-2 text-yellow-400">
                            @for ($i = 0; $i < floor($data->rating); $i++)
                                @if ($i % 2)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                            stroke-width="0" fill="currentColor" />
                                    </svg>
                                @endif
                            @endfor
                            @if (floor($data->rating) % 2 == 1)
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-star-half-filled" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                            @endif
                            @for ($i = 0; $i < 10 - floor($data->rating); $i++)
                                @if ($i % 2)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star"
                                        width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <p class="text-wrap h-48 overflow-y-scroll">
                            {{ $data->sinopsis }}
                        </p>
                        <div class="flex gap-5 my-3">
                            <form action="" method="POST">
                                @csrf
                                <button class="flex gap-2 border border-black rounded-md py-2 px-6 text-sm font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M12.5 17h-6.5v-14h-2" />
                                        <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg>
                                    <span>
                                        Add Cart
                                    </span>
                                </button>
                            </form>
                            <form action="" method="POST">
                                <button class="flex gap-2 border border-black rounded-md py-2 px-6 text-sm font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    </svg>
                                    <span>
                                        Favorite
                                    </span>
                                </button>
                            </form>
                        </div>
                    </main>
                    {{-- info --}}

                    {{-- Comments --}}
                    <main id="commentsBook" class="h-full py-3 hidden">
                        <div
                            class="grid grid-flow-row h-[22.2rem] w-full border border-slate-400 rounded-md overflow-y-scroll overflow-x-hidden">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="px-8 py-4 bg-slate-300 border-b border-black">
                                    <div class="flex items-center gap-4 text-xs font-semibold">
                                        <img src="https://placehold.co/100x100" alt=""
                                            class="w-10 h-10 rounded-full">
                                        <span>
                                            Hanif Ramadhan
                                        </span>
                                    </div>
                                    <span class="text-[9px]">
                                        Senin, 19 Januari 2004
                                    </span>
                                    <p class="text-xs my-4">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur error quibusdam
                                        sequi
                                        itaque, alias quas labore aliquid, odio, quidem inventore laudantium eveniet. Libero
                                        ex
                                        praesentium enim earum placeat laudantium veritatis?
                                    </p>
                                    <div class="flex gap-1 text-yellow-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                                stroke-width="0" fill="currentColor" />
                                        </svg>
                                        <span class="text-[10px] ml-2">
                                            5.0
                                        </span>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <button id="btn-modal"
                            class="flex items-center justify-center gap-5 py-3 rounded-md border border-black text-slate-800 font-semibold mt-4 bg-slate-400 bg-opacity-50 w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M8 9h8" />
                                <path d="M8 13h6" />
                                <path
                                    d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" />
                            </svg>
                            <span>
                                Comments
                            </span>
                        </button>
                    </main>
                    {{-- Comments --}}

                    {{-- Description --}}
                    <main id="descBook" class="h-full py-6 gap-10 hidden">
                        <div class="flex flex-col gap-5 w-max">
                            <span>
                                Title
                            </span>
                            <span>
                                Author
                            </span>
                            <span>
                                Publisher
                            </span>
                            <span>
                                Year Published
                            </span>
                            <span>
                                Category
                            </span>
                            <span>
                                Stock
                            </span>
                            <span>
                                Price
                            </span>
                        </div>
                        <div class="flex flex-col gap-5 w-max">
                            @for ($i = 0; $i < 7; $i++)
                                <span>
                                    :
                                </span>
                            @endfor
                        </div>
                        <div class="flex flex-col gap-5 w-max">
                            <span class="font-semibold">
                                {{ $data->title }}
                            </span>
                            <span>
                                {{ $data->author }}
                            </span>
                            <span>
                                {{ $data->publisher }}
                            </span>
                            <span>
                                {{ $data->year_published }}
                            </span>
                            <span>
                                {{ $data->category_name }}
                            </span>
                            <span>
                                {{ $data->qty }}
                            </span>
                            <span>
                                {{ $data->price }}
                            </span>
                        </div>
                    </main>
                    {{-- Description --}}
                </div>
            </div>
        </div>
    </div>
    <div class="absolute top-0 right-0 bottom-0 left-0 bg-slate-400 items-center justify-center bg-opacity-40 z-50 hidden"
        id="modal">
        <div class="bg-slate-300 border border-black rounded-md relative px-16 py-6">
            <h1 class="font-semibold text-lg">Overal, how would you rate name_book ?</h1>
            <div class="flex justify-center my-4">
                <span class="text-yellow-400 flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer " id="star-full-0" width="19"
                        height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer hidden" id="star-full-1"
                        width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer hidden" id="star-full-2"
                        width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer hidden" id="star-full-3"
                        width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer hidden" id="star-full-4"
                        width="19" height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                            stroke-width="0" fill="currentColor" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer " id="star-0" width="19"
                        height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer " id="star-1" width="19"
                        height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer " id="star-2" width="19"
                        height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer " id="star-3" width="19"
                        height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                </span>
            </div>
            <form action="" method="POST">
                @csrf
                <input type="hidden" name="rating" id="rating" value="2" min="2" max="10"
                    maxlength="2" required>
                <div class="flex flex-col gap-2">
                    <label for="comment" class="text-sm">You want to leave a comment?</label>
                    <textarea name="comment" id="comment" rows="3"
                        class="text-sm p-0 border-0 border-b bg-transparent resize-none outline-none border-black" required></textarea>
                </div>
                <button type="submit"
                    class="text-sm py-2 text-center w-full border border-black rounded-md hover:bg-slate-500 hover:text-slate-50 mt-4">
                    Comment
                </button>
            </form>
            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-4 right-4 cursor-pointer" id="btn-close-modal" width="19" height="19"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </div>
    </div>
@endsection
