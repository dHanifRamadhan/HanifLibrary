<div class="bg-slate-400 bg-opacity-25 py-4 px-6 rounded-md border border-black">
    <div class="flex items-center gap-2 text-slate-800 font-semibold py-1 group mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:animate-pulse" width="21" height="21"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M12 12c2 -2.96 0 -7 -1 -8c0 3.038 -1.773 4.741 -3 6c-1.226 1.26 -2 3.24 -2 5a6 6 0 1 0 12 0c0 -1.532 -1.056 -3.94 -2 -5c-1.786 3 -2.791 3 -4 2z" />
        </svg>
        <span class="text-md">
            Recommended
        </span>
    </div>
    <div @class([
        '-z-10',
        'flex gap-4 overflow-x-scroll' => $recommended != null,
        'flex items-center justify-center py-10' => $recommended == null,
    ])>
        @forelse ($recommended as $key => $value)
            {{-- Books not null --}}
            <a href="{{ route('detail', $value->id) }}" class="px-2 w-max flex flex-col items-center relative group">
                @auth
                    @php
                        $check = DB::table('favorites')
                            ->where('user_id', Auth::user()->id)
                            ->where('book_id', $value->id)
                            ->count();
                    @endphp
                    <form action="{{ route('fav.store', $value->id) }}" method="POST"
                        class="absolute top-2 right-2 z-20 invisible group-hover:visible">
                        @csrf
                        <button type="submit"
                            class="p-2 bg-slate-300 rounded-lg border border-black hover:bg-slate-400 hover:text-white">
                            @if ($check != 0)
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart-check">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 12.572l-3 2.928m-5.5 3.5a8916.99 8916.99 0 0 0 -6.5 -6.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                    <path d="M15 19l2 2l4 -4" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 20l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.96 6.053" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                </svg>
                            @endif
                        </button>
                    </form>
                @endauth
                <div class="h-max w-max flex items-center justify-center pt-4 relative left-[0.6rem] z-10">
                    <div class="relative w-44 h-60 flex pb-8">
                        <div class="w-5 rounded-tl-xl" style="background-color: {{ $value->right_color }};">
                        </div>
                        <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                            style="background-color: {{ $value->cover_color }};">
                            <img src="{{ asset('storage/' . $value->picture) }}"
                                class="w-full h-full rounded-tr-xl border-0" alt="">
                        </div>
                        <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                            style="background-color: {{ $value->bottom_color }};">
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
                <div class="-top-4 left-[0.65rem] relative py-1 mr-4 w-full">
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
                                    class="icon icon-tabler icon-tabler-star-half-filled" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                        stroke-width="0" fill="currentColor" />
                                </svg>
                            @endif
                            @for ($i = 0; $i < 10 - floor($value->rating); $i++)
                                @if ($i % 2)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star"
                                        width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                    </svg>
                                @endif
                            @endfor
                            <span class="text-xs ml-2 text-black">
                                {{ $value->rating / 2 }}
                            </span>
                        </span>
                    </div>
                </div>
            </a>
            {{-- Books not null --}}
        @empty
            {{-- Books is Null --}}
            <span class="text-lg font-semibold border-b border-black">
                There is no recommended book yet !!
            </span>
            {{-- Books is Null --}}
        @endforelse
    </div>
</div>
<div class="my-6 relative flex flex-col bg-slate-400 bg-opacity-80 rounded-lg">
    <div class="border border-black rounded-md py-2 px-4 bg-slate-200">
        <div class="px-1 py-2 flex justify-between">
            <span class="flex gap-2 items-center font-semibold text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                    <path d="M9 4m0 1a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1z" />
                    <path d="M5 8h4" />
                    <path d="M9 16h4" />
                    <path
                        d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z" />
                    <path d="M14 9l4 -1" />
                    <path d="M16 16l3.923 -.98" />
                </svg>
                <span>
                    Category Books
                </span>
            </span>
            <form action="{{ route('dashboard') }}" method="GET" class="flex items-center">
                @if (request()->has('orderBy') == null || request()->input('orderBy') === 'desc')
                    <input type="hidden" name="orderBy" value="asc">
                    <button type="submit" class="p-1 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 20h-8a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                            <path d="M11 16h-5a2 2 0 0 0 -2 2" />
                            <path d="M15 16l3 -3l3 3" />
                            <path d="M18 13v9" />
                        </svg>
                    </button>
                @elseif (request()->input('orderBy') === 'asc')
                    <input type="hidden" name="orderBy" value="desc">
                    <button type="submit" class="p-1 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                            <path d="M13 16h-7a2 2 0 0 0 -2 2" />
                            <path d="M15 19l3 3l3 -3" />
                            <path d="M18 22v-9" />
                        </svg>
                    </button>
                @endif
            </form>
        </div>
        <div class="flex flex-wrap px-[0.45rem] gap-y-1 gap-x-3 text-sm py-2 mb-4">
            <a href="{{ route('dashboard') }}" @class([
                'border border-black py-[0.2rem] px-5 rounded-md',
                'bg-slate-400 text-slate-50' => request()->input('category') == null,
                'hover:bg-slate-400 hover:text-slate-50' =>
                    request()->input('category') != null,
            ])>
                All
            </a>
            @forelse ($categories as $key => $value)
                <form action="{{ route('dashboard') }}" method="GET">
                    <input type="hidden" name="category" value="{{ $value->name }}">
                    <button type="submit" @class([
                        'text-nowrap border border-black py-[0.2rem] px-5 rounded-md',
                        'hover:bg-slate-400 hover:text-slate-50',
                        'bg-slate-400 text-slate-50' =>
                            request()->input('category') == $value->name,
                    ])>
                        {{ $value->name }}
                    </button>
                </form>
            @empty
                <div class="border w-full flex items-center justify-center">
                    <span class="font-semibold border-b border-black">
                        Category not available !
                    </span>
                </div>
            @endforelse
        </div>
    </div>
    <div @class([
        'z-10',
        'py-4 grid grid-cols-6 gap-y-8' => $recommended != null,
        'flex items-center justify-center py-16' => $recommended == null,
    ])>
        @forelse ($books as $key => $value)
            {{-- Books not Null --}}
            <div class="w-full flex flex-col items-center justify-center relative group hover:z-10">
                @php
                    $check = DB::table('favorites')
                        ->where('user_id', Auth::user()->id)
                        ->where('book_id', $value->id)
                        ->count();
                @endphp
                <form action="{{ route('fav.store', $value->id) }}" method="POST"
                    class="absolute top-4 right-11 invisible group-hover:visible">
                    @csrf
                    <button type="submit" class="p-1 bg-slate-400 rounded-md text-white border border-black">
                        @if ($check != 0)
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M19.5 12.572l-3 2.928m-5.5 3.5a8916.99 8916.99 0 0 0 -6.5 -6.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 20l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.96 6.053" />
                                <path d="M16 19h6" />
                                <path d="M19 16v6" />
                            </svg>
                        @endif
                    </button>
                </form>
                <a href="{{ route('detail', $value->id) }}"
                    class="bg-slate-300 pl-[0.7rem] pt-7 rounded-lg text-center border border-slate-700 group-hover:border-black group-hover:border-b-0 group-hover:bg-slate-200 group-hover:shadow-black group-hover:shadow-2xl">
                    <div class="h-max w-max flex items-center justify-center scale-75">
                        <div class="relative w-44 h-60 flex pb-8">
                            <div class="w-5 rounded-tl-xl" style="background-color: {{ $value->right_color }};">
                            </div>
                            <div class="w-[8.75rem] rounded-tr-xl flex items-start justify-end pb-2"
                                style="background-color: {{ $value->cover_color }};">
                                <img src="{{ asset('storage/' . $value->picture) }}"
                                    class="w-full h-full rounded-tr-xl border-0" alt="">
                            </div>
                            <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6"
                                style="background-color: {{ $value->bottom_color }};">
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
                    <span class="font-semibold text-sm relative -top-7 group-hover:invisible">
                        {{ $value->title }}
                    </span>
                </a>
                <div class="absolute -bottom-12 left-0 right-0 flex items-center justify-center">
                    <div
                        class="w-[11.8rem] py-2 bg-slate-300 rounded-b-lg flex-col border border-t-0 border-black hidden group-hover:flex group-hover:shadow-2xl group-hover:shadow-black">
                        <div class="flex flex-col">
                            <span class="text-md text-center font-semibold">
                                {{ $value->title }}
                            </span>
                            <span class="text-center text-xs">
                                {{ $value->author }}
                            </span>
                        </div>
                        @auth
                            <form action="" method="POST" class="mt-2 flex items-center justify-center">
                                <button type="submit"
                                    class="border border-black rounded-md px-4 py-1 hover:bg-slate-400 hover:text-white hover:bg-opacity-50 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="scale-75" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 19a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                        <path d="M12.5 17h-6.5v-14h-2" />
                                        <path d="M6 5l14 1l-.86 6.017m-2.64 .983h-10.5" />
                                        <path d="M16 19h6" />
                                        <path d="M19 16v6" />
                                    </svg>
                                    <span class="text-xs font-semibold">
                                        Add Cart
                                    </span>
                                </button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
            {{-- Books not Null --}}
        @empty
            {{-- Books is Null --}}
            <span class="text-lg font-semibold border-b border-black">
                Books not available !
            </span>
            {{-- Books is Null --}}
        @endforelse
    </div>
    @if ($recommended != null)
        <div class="absolute -bottom-14 left-0 right-0 -z-10 flex justify-center">
            <img src="{{ asset('images/doodles-landscape.webp') }}" alt="" class="">
        </div>
    @endif
</div>
