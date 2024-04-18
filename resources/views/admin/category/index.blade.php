@extends('layouts.app')
@section('title')
    Category
@endsection
@section('preload')
    <style>
        @keyframes dropdown {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animation-dropdown {
            animation: dropdown 0.3s ease-out;
        }
    </style>
@endsection
@section('main')
    @include('admin.category.modalCreate')
    <div class="w-full h-full pt-[4rem] pl-60 relative overflow-y-scroll">
        <div class="p-4 flex flex-col gap-4">
            <div class="px-16 flex flex-col gap-5">
                <div class="flex gap-5 relative">
                    @if (Route::is('category.index'))
                        <button type="button" id="create"
                            class="flex gap-2 items-center justify-center font-semibold py-1 px-3 border-2 border-black bg-slate-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M9 12h6" />
                                <path d="M12 9v6" />
                            </svg>
                            <span>
                                Create
                            </span>
                        </button>
                    @endif
                    <a href="{{ route('category.index') }}"
                        class="flex gap-2 items-center justify-center font-semibold py-1 px-3 border-2 border-black bg-slate-200">
                        @if (Route::is('category.index'))
                            <svg xmlns="http://www.w3.org/2000/svg" class="animate-spin" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                            </svg>
                            <span>
                                Refresh
                            </span>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14l-4 -4l4 -4" />
                                <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                            </svg>
                            <span>
                                Back
                            </span>
                        @endif
                    </a>
                    @if (Auth::user()->role == 'admin')
                        @if (Route::is('category.trash'))
                            @if (Auth::user()->username == 'Hanif')
                                <form action="{{ route('category.delete.all') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="flex gap-2 items-center justify-center font-semibold py-1 px-3 border-2 border-black bg-slate-200">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-http-delete" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z" />
                                            <path d="M14 8h-4v8h4" />
                                            <path d="M10 12h2.5" />
                                            <path d="M17 8v8h4" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('category.trash') }}"
                                class="flex gap-2 items-center justify-center font-semibold py-1 px-3 border-2 border-black bg-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                                <span>
                                    Trash
                                </span>
                            </a>
                        @endif
                    @endif
                    <form action="{{ route('category.index') }}" method="GET"
                        class="flex absolute top-0 bottom-0 right-0">
                        <input type="search" name="search" id="search" placeholder="Search"
                            class="bg-transparent outline-none rounded-l-md border-t-2 border-b-2 border-l-2 border-black px-2">
                        <button type="submit"
                            class="border-2 border-black px-2 rounded-r-md hover:bg-slate-400 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </button>
                    </form>
                </div>
                <table class="border-2 border-black">
                    <thead class="bg-slate-200">
                        <tr>
                            <th class="border-r-2 border-black py-2">No</th>
                            <th class="border-r-2 border-black">Name</th>
                            <th class="border-r-2 border-black">Create Date</th>
                            <th class="border-r-2 border-black">Update Date</th>
                            <th class="border-r-2 border-black">Status</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody class="border-t-2 border-black text-center">
                        @foreach ($data as $key => $value)
                            <tr>
                                <td class="border-r-2 border-black py-1">{{ $key + 1 }}</td>
                                <td class="border-r-2 border-black">{{ $value->name }}</td>
                                <td class="border-r-2 border-black">
                                    {{ $value->created_at != null ? $value->created_at : 'No action taken yet' }}</td>
                                <td class="border-r-2 border-black">
                                    {{ $value->updated_at != null ? $value->updated_at : 'No action taken yet' }}</td>
                                <td class="border-r-2 border-black">
                                    @if ($value->deleted_at == null)
                                        Available
                                    @else
                                        Unavailable
                                    @endif
                                </td>
                                <td>
                                    @if (Route::is('category.index'))
                                        <form action="{{ route('category.delete', $value->id) }}" method="POST"
                                            class="w-full h-full flex gap-5 items-center justify-center">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('category.show', $value->id) }}"
                                                class="flex gap-3 items-center text-yellow-500">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="19"
                                                    height="19" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </a>
                                            <button type="submit" class="flex gap-3 items-center text-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-http-delete" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z" />
                                                    <path d="M14 8h-4v8h4" />
                                                    <path d="M10 12h2.5" />
                                                    <path d="M17 8v8h4" />
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        <div class="w-full h-full flex gap-5 items-center justify-center">
                                            <form action="{{ route('category.recive', $value->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="flex gap-3 items-center text-green-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-clock-check" width="19"
                                                        height="19" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967" />
                                                        <path d="M12 7v5l3 3" />
                                                        <path d="M15 19l2 2l4 -4" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('category.delete', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex gap-3 items-center text-red-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-http-delete" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M3 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z" />
                                                        <path d="M14 8h-4v8h4" />
                                                        <path d="M10 12h2.5" />
                                                        <path d="M17 8v8h4" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="py-2 flex items-center justify-center">
                    {{ $data->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('create').addEventListener('click', function() {
            var modal = document.getElementById('modal')
            modal.classList.remove('hidden')
        })
    </script>
@endsection
