{{-- Card Books --}}
<div class="relative w-40 h-56 flex">
    <div class="w-1/6 h-5/6 rounded-tl-3xl" id="cover-side"></div>
    <div class="w-5/6 h-5/6 rounded-tr-lg flex items-center justify-center" id="cover">
        <img src="https://placehold.co/133x170" alt="" class="rounded-tr-lg">
    </div>
    <div class="absolute bottom-4 right-0 left-0 h-1/6 rounded-l-2xl" id="cover-bottom">
        <div class="w-full relative h-full">
            <div class="bg-slate-300 rounded-l-2xl h-7 w-36 absolute right-0 bottom-1">
                <div class="w-full h-full relative">
                    <div class="w-6 h-8 bg-yellow-300 absolute right-5 -bottom-3">
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var cover = document.getElementById('cover')
    var coverSide = document.getElementById('cover-side')
    var coverBottom = document.getElementById('cover-bottom')
    
    cover.style.backgroundColor = '#64748B';
    coverSide.style.backgroundColor = '#475569';
    coverBottom.style.backgroundColor = '#1E293B';
</script>
{{-- Card Books --}}
