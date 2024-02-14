<div class="absolute bg-slate-200 top-0 left-0 right-0 bottom-0 bg-opacity-50 hidden" id="modal">
    <div class="h-full w-full flex items-center justify-center">
        <div class="border-2 border-black py-5 px-5 relative bg-slate-200">
            <form action="{{ route('category.create') }}" method="POST" class="flex flex-col gap-5 ">
                @csrf
                <h1 class="font-mono underline font-semibold">Input Category</h1>
                <div class="flex flex-col gap-2">
                    <label for="category" class="px-1 font-mono">Category</label>
                    <input type="text" id="category"
                        class="bg-transparent border-b-2 border-black px-1 w-96 outline-none" placeholder="Category"
                        name="category" required>
                </div>
                <button class="border-2 border-black py-3 font-mono font-semibold rounded-md hover:bg-slate-200"
                    type="submit">
                    Save
                </button>
            </form>
            <button class="absolute top-3 right-5" id="anjing">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 6l-12 12" />
                    <path d="M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
<script>
    document.getElementById('anjing').addEventListener('click', function() {
        var modal = document.getElementById('modal')
        modal.classList.add('hidden')
    })
</script>
