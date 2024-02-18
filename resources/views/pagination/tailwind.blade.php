@if ($paginator->hasPages())
    <div class="px-2 flex items-center gap-6">
        @if ($paginator->onFirstPage())
            <button disabled class="border-2 border-black bg-slate-200 px-2 py-1 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="border-2 border-black bg-slate-200 px-2 py-1 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M5 12l6 6" />
                    <path d="M5 12l6 -6" />
                </svg>
            </a>
        @endif
        <div class="flex items-center gap-2">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span
                        class="border-2 border-black bg-slate-400 text-white px-2 rounded-md">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $key => $value)
                        @if ($key == $paginator->currentPage())
                            <span class="border-2 border-black bg-slate-400 text-white px-2 rounded-md">{{ $key }}</span>
                        @else
                            <a href="{{ $value }}" class="border-2 border-black bg-slate-200 px-2 rounded-md">
                                {{ $key }} </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="border-2 border-black bg-slate-200 px-2 py-1 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </a>
        @else
            <button disabled class="border-2 border-black bg-slate-200 px-2 py-1 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-right" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </button>
        @endif
    </div>
@endif
