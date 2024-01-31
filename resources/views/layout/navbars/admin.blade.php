<nav class="absolute top-0 left-0 right-0 h-[4rem] ml-60 bg-slate-400">
    <div class="h-full flex items-center justify-end pr-24 gap-5">
        <button type="button" class="flex relative items-center" onclick="OffSearch()">
            <input type="text" placeholder="search" name="search" id="search"
                class="text-sm border-b-2 border-slate-100 bg-transparent outline-none text-slate-100 pr-7 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-slate-100 border-b-2 border-slate-100 mt-[2px]" width="21"
                height="21" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </button>
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
            <img src="https://placehold.co/100x100" alt=""
                class="rounded-full w-12 h-12 border-slate-600 border-2">
        </span>
    </div>
</nav>
<script>
    function OffSearch()  {
        var search = document.getElementById('search')
        if (search.classList.contains('hidden')) {
            search.classList.remove('hidden')
            search.classList.add('animate-shrinkAndDisappear')
        } else {
            search.classList.add('hidden')
        }
    }
</script>
