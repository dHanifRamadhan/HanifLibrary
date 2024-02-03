@extends('layout.app')
@section('title')
    Officer
@endsection
@section('preload')
@endsection
@section('main')
    <div class="px-16 flex gap-5 relative">
        <a href="{{route('officer.create')}}"
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
        <div class="flex items-center gap-2 bg-slate-200 px-3 border-2 border-black rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="" width="19" height="19" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M3 9l4 -4l4 4m-4 -4v14" />
                <path d="M21 15l-4 4l-4 -4m4 4v-14" />
            </svg>
            <select name="list" id="list" class="bg-transparent outline-none w-20">
                <option selected disabled>List</option>
            </select>
        </div>
    </div>
    <div class="px-16 py-5">
        <table class="border-2 border-black w-full">
            <thead class="bg-slate-200 border-b-2 border-black">
                <tr>
                    <th class="border-r-2 border-black py-2">No</th>
                    <th class="border-r-2 border-black">Username</th>
                    <th class="border-r-2 border-black">Email</th>
                    <th class="border-r-2 border-black">Phone</th>
                    <th class="border-r-2 border-black">Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center border-2 border-black">
                    <td class="border-r-2 border-black py-6">1</td>
                    <td class="border-r-2 border-black">
                        <div class="flex gap-2 items-center justify-center">
                            <img src="https://placehold.co/100x100" alt="" class="w-12 h-12 rounded-full">
                            <span class="font-semibold">
                                Hanif
                            </span>
                        </div>
                    </td>
                    <td class="border-r-2 border-black">
                        d.haniframadhan@gmail.com
                    </td>
                    <td class="border-r-2 border-black">
                        +62 123-3456-6789
                    </td>
                    <td class="border-2 border-black">
                        Active
                    </td>
                    <td>
                        <form action="" method="POST" class="flex gap-5 w-full items-center justify-center">
                            @csrf
                            @method('DELETE')
                            <a href="" class="text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class=""
                                    width="19" height="19" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                    <path d="M16 5l3 3" />
                                </svg>
                            </a>
                            <button type="submit" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 8v8h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-2z" />
                                    <path d="M14 8h-4v8h4" />
                                    <path d="M10 12h2.5" />
                                    <path d="M17 8v8h4" />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
