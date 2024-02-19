<nav class="absolute top-0 left-0 right-0 h-[4rem] ml-60 bg-slate-400 border-l-2 border-black">
    <div class="h-full flex items-center justify-end pr-24 gap-5">
        <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-100" width="22" height="22"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                <path d="M3 7l9 6l9 -6" />
            </svg>
        </a>
        <span class="">
            <img src="{{asset('storage/'.Auth::user()->profile)}}" alt=""
                class="rounded-full w-12 h-12 border-slate-600 border-2">
        </span>
    </div>
</nav>