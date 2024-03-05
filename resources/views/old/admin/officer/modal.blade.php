<div id="modal" class="absolute top-0 left-0 right-0 bottom-0 bg-black bg-opacity-20 hidden">
    <div class="w-full h-full flex items-center justify-center">
        <div class="h-max bg-slate-200 rounded-md border-2 border-black py-5 px-10 relative">
            <h1 class="text-xl font-semibold underline">Reset Password</h1>
            <form action="{{route('officer.reset')}}" method="POST" class="flex flex-col gap-6 mt-10">
                @csrf
                @method('PUT')
                <input type="hidden" name="userId" value="" id="inputUserId" required>
                <div class="flex flex-col">
                    <label for="password" class="font-semibold text-sm">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-96 outline-none border-b-2 border-black bg-transparent py-1 pl-2 pr-10">
                </div>
                <button type="submit" class="bg-slate-400 py-2 rounded-md font-semibold border-2 border-black">Save</button>
            </form>
            <button type="button" class="absolute top-6 right-6" id="close">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
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
    function showModal(id) {
        var input = document.getElementById('inputUserId')
        var modal = document.getElementById('modal')
        if (modal.classList.contains('hidden') && input.value == "") {
            input.value = id
            modal.classList.remove('hidden')
        }
    }

    document.getElementById('close').addEventListener('click', function() {
        var modal = document.getElementById('modal')
        if (modal.classList.contains('hidden') != true && document.getElementById('inputUserId').value != "") {
            modal.classList.add('hidden')
            document.getElementById("inputUserId").value = ""
        }
    })
</script>