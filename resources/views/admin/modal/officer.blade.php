<div class="absolute top-0 left-0 right-0 w-screen h-screen z-10 bg-slate-400 bg-opacity-50 items-center justify-center hidden" id="modal">
    <div class="bg-slate-500 p-5 rounded-md relative text-white text-sm border-2 border-white">
        <div class="flex items-center gap-2">
            <hr class="border-white w-4">
            <span>
                Officer
            </span>
            <hr class="border-white w-80">
        </div>
        <form action="{{route('users.store')}}" method="POST" class="text-xs mt-5 grid grid-cols-2 gap-3">
            @csrf
            <div class="flex flex-col">
                <label>Username</label>
                <input type="text" name="username" class="py-1 px-1 text-black rounded-md outline-none">
            </div>
            <div class="flex flex-col">
                <label>Email</label>
                <input type="text" name="email" class="py-1 px-1 text-black rounded-md outline-none">
            </div>
            <div class="flex flex-col">
                <label>Password</label>
                <input type="text" name="password" value="officer123" class="py-1 px-1 text-slate-400 rounded-md outline-none" readonly>
            </div>
            <div class="flex flex-col">
                <label>Real Name</label>
                <input type="text" name="name" class="py-1 px-1 text-black rounded-md outline-none">
            </div>
            <div class="flex flex-col col-span-2">
                <label>Phone</label>
                <div class="flex">
                    <input type="text" value="+62" class="w-10 py-1 px-1 text-black rounded-l-md outline-none" readonly>
                    <input type="text" name="phone" class="w-full py-1 px-1 text-black rounded-r-md outline-none" id="number">
                </div>
            </div>
            <div class="flex flex-col col-span-2">
                <label>Address</label>
                <textarea name="address" id="" cols="30" rows="4" class="py-1 px-1 text-black rounded-md outline-none"></textarea>
            </div>
            <button type="submit">
                Simpan
            </button>
            <button type="button" id="btn-close-modal">
                Back
            </button>
        </form>
    </div>
</div>
