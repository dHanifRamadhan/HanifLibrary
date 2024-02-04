@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('main')
    {{-- Admin || Officer --}}
    @auth
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'officer')
            <div class="px-16 py-5">
                <div class="h-full w-full grid grid-cols-4 gap-5">
                    <div class="border-2 border-black rounded-lg bg-slate-200">
                        <div class="h-full p-3 relative">
                            <span class="font-semibold">
                                Borrowed
                            </span>
                            <div class="flex mt-2">
                                <span class="text-3xl font-semibold mr-1">
                                    200
                                </span>
                                /Pcs
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="22" height="22"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14 20h-8a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                <path d="M11 16h-5a2 2 0 0 0 -2 2" />
                                <path d="M15 16l3 -3l3 3" />
                                <path d="M18 13v9" />
                            </svg>
                        </div>
                    </div>
                    <div class="border-2 border-black rounded-lg bg-slate-200">
                        <div class="h-full p-3 relative">
                            <span class="font-semibold">
                                Returned
                            </span>
                            <div class="flex mt-2">
                                <span class="text-3xl font-semibold mr-1">
                                    200
                                </span>
                                /Pcs
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="22" height="22"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                <path d="M13 16h-7a2 2 0 0 0 -2 2" />
                                <path d="M15 19l3 3l3 -3" />
                                <path d="M18 22v-9" />
                            </svg>
                        </div>
                    </div>
                    <div class="border-2 border-black col-span-2 row-span-2 rounded-lg bg-slate-200">
                        <div class="h-full p-3 relative">
                            <span class="font-semibold">
                                Users
                            </span>
                            <canvas id="usersLine" height="120"></canvas>
                        </div>
                    </div>
                    <div class="border-2 border-black rounded-lg bg-slate-200">
                        <div class="h-full p-3 relative">
                            <span class="font-semibold">
                                Returned
                            </span>
                            <div class="flex mt-2">
                                <span class="text-3xl font-semibold mr-1">
                                    200
                                </span>
                                /Pcs
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="22" height="22"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                <path d="M13 16h-7a2 2 0 0 0 -2 2" />
                                <path d="M15 19l3 3l3 -3" />
                                <path d="M18 22v-9" />
                            </svg>
                        </div>
                    </div>
                    <div class="border-2 border-black rounded-lg bg-slate-200">
                        <div class="h-full p-3 relative">
                            <span class="font-semibold">
                                Returned
                            </span>
                            <div class="flex mt-2">
                                <span class="text-3xl font-semibold mr-1">
                                    200
                                </span>
                                /Pcs
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-3 right-3" width="22" height="22"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5" />
                                <path d="M13 16h-7a2 2 0 0 0 -2 2" />
                                <path d="M15 19l3 3l3 -3" />
                                <path d="M18 22v-9" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-16 py-5">
                <table class="w-full border-2 border-black" id="special">
                    <thead class="bg-slate-200 border-b-2 border-black">
                        <tr>
                            <th class="border-r-2 border-black py-2">No</th>
                            <th class="border-r-2 border-black">Name User</th>
                            <th class="border-r-2 border-black">Books</th>
                            <th class="border-r-2 border-black">Borrowing Date</th>
                            <th class="border-r-2 border-black">Return Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr class="border-b-2 border-black">
                            <td class="border-r-2 border-black py-2">1</td>
                            <td class="border-r-2 border-black">Hanif</td>
                            <td class="border-r-2 border-black">
                                <div class="h-full w-full flex items-center justify-center py-3">
                                    <div class="relative w-20 h-28 flex">
                                        <div class="w-1/6 h-5/6 rounded-tl-3xl" style="background-color: #475569"></div>
                                        <div class="w-5/6 h-5/6 rounded-tr-lg flex items-start justify-center" style="background-color: #64748B">
                                            <img src="https://placehold.co/133x168" alt="" class="rounded-tr-lg">
                                        </div>
                                        <div class="absolute bottom-2 right-0 left-0 h-1/6 rounded-l-2xl" style="background-color: #1E293B">
                                            <div class="w-full relative h-full">
                                                <div class="bg-slate-300 rounded-l-2xl h-3 w-[4.2rem] absolute right-0 bottom-1">
                                                    <div class="w-full h-full relative">
                                                        <div class="w-3 h-4 bg-yellow-300 absolute right-3 -bottom-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-r-2 border-black">2004-10-22</td>
                            <td class="border-r-2 border-black">2005-10-22</td>
                            <td class="border-r-2 border-black">Borrow</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
    @endauth
    {{-- Admin || Officer --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function DivRefresh() {
                var div = document.getElementById('refresh');
                div.innerHTML = div.innerHTML;
            }

            setInterval(DivRefresh, 1000);

            var usersLine = document.getElementById('usersLine');

            const labels = ['January', 'February', 'March', 'April'];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Users Register',
                    data: [10, 11, 15, 8],
                    borderColor: 'black',
                    backgroundColor: ''
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Registers'
                        }
                    }
                },
            };

            new Chart(usersLine, config);
        });
    </script>
@endsection
