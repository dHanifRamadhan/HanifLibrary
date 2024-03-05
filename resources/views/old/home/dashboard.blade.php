    <div class="mx-5 mt-4 px-8 pt-5 bg-slate-100 bg-opacity-80 rounded-md z-10">
        <div class="flex justify-between">
            <span class="font-bold text-lg">
                Recommended
            </span>
            <a href=""
                class="outline-none flex items-center gap-1 text-xs font-semibold px-3 rounded-md hover:bg-sky-500 hover:text-slate-100">
                <span>
                    See All
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="" width="19" height="19" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M13 7h-6l4 5l-4 5h6l4 -5z" />
                </svg>
            </a>
        </div>
        <div class="mt-3 flex gap-5 overflow-x-auto w-full">
            @foreach ($recommended as $key => $value)
                <a href="" class="px-2w w-max flex flex-col items-center" id="RecommededBooks">
                    <div class="h-max w-max flex items-center justify-center pt-4">
                        <div class="relative w-44 h-60 flex pb-8">
                            <div class="w-5 rounded-tl-xl" style="background-color: {{ $value->cover_right_color }};"
                                id="cover_right_color">
                            </div>
                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                style="background-color: {{ $value->cover_color }};" id="cover_color">
                                <img src="{{ asset('storage/' . $value->picture) }}"
                                    class="w-full h-full rounded-tr-xl border-0" alt="" id="cover_image">
                            </div>
                            <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                style="background-color: {{ $value->cover_bottom_color }};" id="cover_bottom_color">
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
                    <div class="-top-5 relative py-1 mr-4">
                        <div class="w-full h-full flex flex-col">
                            <span class="text-center font-semibold underline">
                                {{ $value->title }}
                            </span>
                            <span class="flex items-center justify-center text-yellow-300 scale-75 mt-2 gap-1">
                                @for ($i = 0; $i < floor($value->rating); $i++)
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
                                @if (floor($value->rating) % 2 == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-star-half-filled" width="18"
                                        height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                            stroke-width="0" fill="currentColor" />
                                    </svg>
                                @endif
                                @for ($i = 0; $i < 10 - floor($value->rating); $i++)
                                    @if ($i % 2)
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-star" width="18" height="18"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                        </svg>
                                    @endif
                                @endfor
                                <span class="text-xs ml-2 text-black"> 
                                    {{ $value->rating_true }}
                                </span>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="bg-slate-100 bg-opacity-80 mt-8 rounded-md mx-5 py-4 px-8">
        <div class="flex justify-between items-center">
            <span class="font-bold text-lg">
                Categories
            </span>
            <form action="" method="GET" class="">
                <button type="submit" class="hover:bg-sky-500 hover:text-slate-100 p-1 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="" width="18" height="18"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 21v-6" />
                        <path d="M20 6l-3 -3l-3 3" />
                        <path d="M17 3v18" />
                        <path d="M10 18l-3 3l-3 -3" />
                        <path d="M7 3v2" />
                        <path d="M7 9v2" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="flex flex-row items-center py-1 pt-2 gap-2 overflow-x-scroll w-full">
            @if (Request::is('dashboard'))
                <span class="px-4 py-1 text-xs border-2 border-slate-800 rounded-md bg-slate-400 text-slate-100">
                    All
                </span>
            @else
                <a href="{{ route('dashboard') }}" class="px-4 py-1 text-xs border-2 border-slate-800 rounded-md">
                    All
                </a>
            @endif
            @foreach ($categories as $key => $value)
                @if (Request::is('dashboard/'.$value->name))
                    <span
                        class="w-max px-4 py-1 text-xs border-2 border-slate-800 rounded-md bg-slate-400 text-slate-50 text-nowrap">
                        {{ $value->name }}
                    </span>
                @else
                    <a href="{{ route('dashboard', $value->name) }}"
                        class="w-max px-4 py-1 text-xs border-2 border-slate-800 rounded-md hover:bg-slate-400 hover:text-slate-50 text-nowrap">
                        {{ $value->name }}
                    </a>
                @endif
            @endforeach
        </div>
        <div class="py-2 mt-3 flex flex-wrap w-full">
            @foreach ($books as $key => $value)
                <a href="" class="px-2w w-max scale-90 group hover:mx-4 flex flex-col items-center">
                    <div class="h-max w-max flex items-center justify-center pt-4">
                        <div class="relative w-44 h-60 flex pb-8 group-hover:scale-125">
                            <div class="w-5 rounded-tl-xl" style="background-color: {{ $value->cover_right_color }};"
                                id="cover_right_color">
                            </div>
                            <div class="w-4/5 rounded-tr-xl flex items-start justify-end pb-2"
                                style="background-color: {{ $value->cover_color }};" id="cover_color">
                                <img src="{{ asset('storage/' . $value->picture) }}"
                                    class="w-full h-full rounded-tr-lg border-0" alt="" id="cover_image">
                            </div>
                            <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                style="background-color: {{ $value->cover_bottom_color }}" id="cover_bottom_color">
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
                    <div class="-top-5 relative py-1 mr-4 group-hover:top-3">
                        <div class="w-full h-full flex flex-col">
                            <span class="text-center font-semibold underline text-sm">
                                {{ $value->title }}
                            </span>
                            <span class="text-center text-xs">
                                {{ $value->author }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    {{-- @include('home.books.detail') --}}
