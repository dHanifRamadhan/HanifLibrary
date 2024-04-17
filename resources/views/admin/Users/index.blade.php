@extends('layouts.app')
@section('title')
    Users
@endsection
@section('main')
    <div class="w-full h-full pt-[4rem] pl-60 relative">
        <div class="p-4 flex flex-col gap-4">
            <div class="py-1 flex items-center gap-1">
                <hr class="w-20 border-black">
                <span>
                    Officer
                </span>
                <hr class="border-black w-full">
            </div>
            <div class="bg-slate-200 p-3 rounded-md flex flex-col gap-y-3 border border-slate-400">
                <div class="flex justify-end gap-x-4">
                    <form action="" method="GET" class="flex">
                        <input type="search" name="officer" placeholder="Name for Officer ..."
                            class="bg-slate-100 border border-slate-500 rounded-l-md outline-none px-2 text-sm py-1">
                        <button
                            class="p-2 flex items-center justify-center bg-slate-100 border border-l-0 border-slate-500 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </button>
                    </form>
                    <button class="px-2 bg-green-500 border border-slate-500 rounded-md" type="button" type="button"
                        id="btn-modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </button>
                    <form action="" method="GET" class="flex">
                        <input type="hidden" name="officerId" id="officer-updated-id">
                        <button class="px-2 bg-yellow-500 border border-slate-500 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                <path d="M13.5 6.5l4 4" />
                            </svg>
                        </button>
                    </form>
                    <form action="{{ route('users.delete') }}" method="POST" class="flex">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="officerId" id="officer-deleted-id">
                        <button class="px-2 bg-red-400 border-slate-500 border rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
                <hr class="border-black">
                <table class="text-xs text-center">
                    @empty($officer)
                        <thead class="">
                            <tr>
                                <th class="py-2">Select</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Real Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                    @endempty
                    <tbody>
                        @forelse ($officer as $key => $value)
                            <tr class="border-t border-black">
                                <td class="py-3 border-r border-black">
                                    <input type="checkbox" class="checkbox-officer-id" value="{{ $value->id }}">
                                </td>
                                <td class="border-r border-black">
                                    <div class="w-full h-full flex items-center justify-center py-2 gap-4">
                                        <img src="https://placehold.co/100x100" alt="" width="40px" height="40px"
                                            class="rounded-full">
                                        <span>
                                            {{ $value->username }}
                                        </span>
                                    </div>
                                </td>
                                <td class="border-r border-black">
                                    {{ $value->email }}
                                </td>
                                <td class="border-r border-black">
                                    {{ $value->name }}
                                </td>
                                <td class="border-r border-black">
                                    {{ $value->phone }}
                                </td>
                                <td class="text-wrap w-60">
                                    {{ $value->address }}
                                </td>
                            </tr>
                        @empty
                            <div class="text-center">
                                Tidak ada data Officer pada database!
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="py-1 flex items-center gap-1">
                <hr class="w-20 border-black">
                <span>
                    Customer
                </span>
                <hr class="border-black w-full">
            </div>
            <div class="bg-slate-200 p-3 rounded-md flex flex-col gap-y-3 border border-slate-400">
                <div class="flex justify-end gap-x-4">
                    <form action="" method="GET" class="flex">
                        <input type="search" name="librarian" placeholder="Name for Librarian ..."
                            class="bg-slate-100 border border-slate-500 rounded-l-md outline-none px-2 text-sm py-1">
                        <button
                            class="p-2 flex items-center justify-center bg-slate-100 border border-l-0 border-slate-500 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-search">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M21 21l-6 -6" />
                            </svg>
                        </button>
                    </form>
                    <form action="" method="POST" class="flex">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="customerId" id="customer-coin-id">
                        <input type="number" name="coins"
                            class="bg-slate-100 border border-slate-500 rounded-l-md outline-none px-2 text-sm py-1"
                            placeholder="For Coins Users">
                        <button
                            class="p-2 flex items-center justify-center bg-slate-100 border border-l-0 border-slate-500 rounded-r-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-coins">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 14c0 1.657 2.686 3 6 3s6 -1.343 6 -3s-2.686 -3 -6 -3s-6 1.343 -6 3z" />
                                <path d="M9 14v4c0 1.656 2.686 3 6 3s6 -1.344 6 -3v-4" />
                                <path
                                    d="M3 6c0 1.072 1.144 2.062 3 2.598s4.144 .536 6 0c1.856 -.536 3 -1.526 3 -2.598c0 -1.072 -1.144 -2.062 -3 -2.598s-4.144 -.536 -6 0c-1.856 .536 -3 1.526 -3 2.598z" />
                                <path d="M3 6v10c0 .888 .772 1.45 2 2" />
                                <path d="M3 11c0 .888 .772 1.45 2 2" />
                            </svg>
                        </button>
                    </form>
                    <form action="" method="GET" class="flex">
                        <input type="hidden" name="customerId" id="customer-update-id">
                        <button class="px-2 bg-yellow-500 border border-slate-500 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                <path d="M13.5 6.5l4 4" />
                            </svg>
                        </button>
                    </form>
                    <form action="" method="POST" class="flex">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="customerId" id="customer-ban-id">
                        <button class="px-2 bg-red-500 border-slate-500 border rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-ban">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M5.7 5.7l12.6 12.6" />
                            </svg>
                        </button>
                    </form>
                    <form action="" method="POST" class="flex">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="customerId" id="customer-delete-id">
                        <button class="px-2 bg-red-400 border-slate-500 border rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
                <hr class="border-black">
                <table class="text-xs text-center">
                    <thead class="">
                        <tr>
                            <th class="py-2">Select</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Real Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-black">
                            <td class="py-3 border-r border-black">
                                <input type="checkbox" class="checkbox-customer-id" value="1">
                            </td>
                            <td class="border-r border-black">
                                <div class="w-full h-full flex items-center justify-center py-2 gap-4">
                                    <img src="https://placehold.co/100x100" alt="" width="40px" height="40px"
                                        class="rounded-full">
                                    <span>
                                        dHanifRamadhan
                                    </span>
                                </div>
                            </td>
                            <td class="border-r border-black">
                                d.haniframadhan@gmai.com
                            </td>
                            <td class="border-r border-black">
                                Hanif Ramadhan
                            </td>
                            <td class="border-r border-black">
                                +62 123-1233-1312
                            </td>
                            <td>
                                Jl lama banget
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @include('admin.modal.officer')
    </div>
@endsection
