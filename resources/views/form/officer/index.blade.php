@extends('layout.app')
@section('title')
    Officer
@endsection
@section('preload')
@endsection
@section('main')
    <div class="mx-16 flex gap-5 relative">
        <a href="{{ route('officer.create') }}"
            class="flex items-center justify-center w-max gap-3 font-semibold bg-slate-200 py-1 px-3 border-2 border-black rounded-md text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="" width="17" height="17" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                <path d="M7 9l5 -5l5 5" />
                <path d="M12 4l0 12" />
            </svg>
            <span>
                Create
            </span>
        </a>
        <form action="" method="POST" class="flex absolute top-0 bottom-0 right-0">
            @csrf
            <input type="search" name="search" id="search" placeholder="Search"
                class="bg-transparent outline-none rounded-l-md border-t-2 border-b-2 border-l-2 border-black px-2">
            <button type="submit" class="border-2 border-black px-2 rounded-r-md hover:bg-slate-400 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                    <path d="M21 21l-6 -6" />
                </svg>
            </button>
        </form>
    </div>
    <div class="px-16 py-5">
        <table class="border-2 border-black w-full" id="refresh">
            <thead class="bg-slate-200 border-b-2 border-black">
                <tr>
                    <th class="border-r-2 border-black py-2">No</th>
                    <th class="border-r-2 border-black">Username</th>
                    <th class="border-r-2 border-black">Email</th>
                    <th class="border-r-2 border-black">Phone</th>
                    <th class="border-r-2 border-black">
                        <div class="flex w-full h-full items-center justify-center gap-2">
                            <form action="" method="" class="flex items-center">
                                @csrf
                                <button type="submit">
                                    @if ($status != 'Active')
                                        <input type="hidden" name="status" value="ban">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500" width="19"
                                            height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M5.7 5.7l12.6 12.6" />
                                        </svg>
                                    @else
                                        <input type="hidden" name="status" value="active">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="text-green-500" width="19"
                                            height="19" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967" />
                                            <path d="M12 7v5l3 3" />
                                            <path d="M15 19l2 2l4 -4" />
                                        </svg>
                                    @endif
                                </button>
                            </form>
                            Status
                        </div>
                    </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr class="text-center border-2 border-black">
                        <td class="border-r-2 border-black py-6">{{ $key + 1 }}</td>
                        <td class="border-r-2 border-black">
                            <div class="flex gap-2 items-center justify-center">
                                <img src="{{ asset('storage/' . $value->profile) }}" alt=""
                                    class="w-12 h-12 rounded-full" />
                                <span class="font-semibold">
                                    {{ $value->username }}
                                </span>
                            </div>
                        </td>
                        <td class="border-r-2 border-black">
                            {{ $value->email }}
                        </td>
                        <td class="border-r-2 border-black">
                            {{ $value->phone }}
                        </td>
                        <td class="border-2 border-black">
                            @if ($value->deleted_at != null)
                                Ban
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                            <div class="flex gap-5 w-full items-center justify-center h-full">
                                <input type="hidden" id="userId" value="{{ $value->id }}">
                                <button id="resetPassword" type="button" class="text-yellow-400 mb-1"
                                    onclick="showModal(document.getElementById('userId').value)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-key"
                                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" />
                                        <path d="M15 9h.01" />
                                    </svg>
                                </button>
                                @if ($value->deleted_at != null)
                                    <form action="{{ route('officer.unban', $value->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-circle-check" width="20"
                                                height="20" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M9 12l2 2l4 -4" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('officer.ban', $value->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-red-500">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-ban" width="20" height="20"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                                <path d="M5.7 5.7l12.6 12.6" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('officer.delete', $value->id) }}" method="POST">
                                    <button type="submit" class="text-red-500 mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z" />
                                            <path d="M14 8h-4v8h4" />
                                            <path d="M10 12h2.5" />
                                            <path d="M17 8v8h4" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('form.officer.modal')
@endsection
