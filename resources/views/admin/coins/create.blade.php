<div class="absolute top-0 right-0 bottom-0 left-0 bg-slate-400 bg-opacity-15 items-center justify-center hidden"
    id="modal">
    <div class="flex flex-col py-3 px-5 rounded-md border border-black bg-slate-300 relative">
        <h1 class="font-mono font-semibold text-xl">
            Created Coins For Users
        </h1>
        <form action="{{ route('coin.store') }}" method="POST" enctype="multipart/form-data"
            class="py-2 flex flex-col gap-1">
            @csrf
            <div class="p-2 grid grid-cols-2 grid-rows-3 gap-x-5 gap-y-2">
                <div class=" flex flex-col gap-1">
                    <label for="qty" class="text-xs font-semibold">Quantity :</label>
                    <input type="number" name="qty" id="qty"
                        class="w-[19rem] border-0 bg-transparent border-b border-black h-[2rem] text-sm" min="0"
                        placeholder="100pcs">
                </div>
                <div class="row-span-3 flex items-center justify-center">
                    <img src="" alt="" class="w-48 h-3w-48 rounded-md hidden" id="preview">
                </div>
                <div class="flex flex-col">
                    <label for="price" class="text-xs font-semibold">Price :</label>
                    <div class="flex items-center gap-2">
                        <span class="text-sm">
                            Rp
                        </span>
                        <input type="text" name="price" id="price"
                            class="w-full border-0 bg-transparent border-b border-black h-[2rem] text-sm p-0">
                    </div>
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-xs font-semibold">Picture :</label>
                    <input type="file" name="picture" id="imageInput"
                        class="mt-2 border-0 bg-transparent border-b border-black text-sm file:contents px-3 py-1">
                </div>
            </div>
            <button type="submit"
                class="border border-black rounded-md py-2 mx-2 mt-5 bg-slate-400 text-slate-50 hover:bg-slate-500 hover:bg-opacity-80">
                Save
            </button>
        </form>
        <button type="button" id="close" class="scale-75 absolute top-4 right-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
