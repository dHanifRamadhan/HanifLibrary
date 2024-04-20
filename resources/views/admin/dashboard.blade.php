<div class="px-16 py-5">
    <h1 class="font-mono text-xl font-semibold">
        Welcome
        <span class="font-bold italic">
            {{ Auth::user()->username }}
        </span>
        in Dashbord Hanif Library !!
    </h1>
</div>
<div class="px-16 py-5">
    <div class="h-full w-full grid grid-cols-4 gap-5">
        <div class="border-2 border-black rounded-lg bg-slate-200">
            <div class="h-full p-3 relative">
                <span class="font-semibold">
                    Users
                </span>
                <div class="flex mt-2">
                    <span class="text-3xl font-semibold mr-1">
                        {{ DB::table('users')->where('role', 'librarian')->whereNull('deleted_at')->count() }}
                    </span>
                    librarian
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
                    Users
                </span>
                <div class="flex mt-2">
                    <span class="text-3xl font-semibold mr-1">
                        {{ DB::table('users')->where('role', 'officer')->whereNull('deleted_at')->count() }}
                    </span>
                    Officer
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
                    Books
                </span>
                <div class="flex mt-2">
                    <span class="text-3xl font-semibold mr-1">
                        {{ DB::table('books')->whereNull('deleted_at')->count() }}
                    </span>
                    Pcs
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
                    Books Sold
                </span>
                <div class="flex mt-2">
                    <span class="text-3xl font-semibold mr-1">
                        @php
                            $dataTransaction = DB::table('transactions')
                                ->select(DB::raw('SUM(total_qty) AS total'))
                                ->first();
                        @endphp
                        {{ $dataTransaction->total }}
                    </span>
                    Pcs
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
                <th class="border-r-2 border-black py-2">No Transaction</th>
                <th class="border-r-2 border-black">Name User</th>
                <th class="border-r-2 border-black">Total Quantity</th>
                <th class="border-r-2 border-black">Total Price</th>
                <th class="border-r-2 border-black">Transaction Date</th>
                <th class="border-r-2 border-black">Package Arrived</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @php
                $transaction = DB::table('transactions AS a')
                    ->select('a.*', 'b.name')
                    ->leftJoin('users AS b', 'a.user_id', '=', 'b.id')
                    ->get();
            @endphp
            @forelse ($transaction as $key => $value)
                <tr class="border-b-2 border-black">
                    <td class="border-r-2 border-black py-2">
                        @php
                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $value->transaction_date);
                        @endphp
                        NFB{{ $date->format('Ymd') . $value->id }}
                    </td>
                    <td class="border-r-2 border-black"> {{ $value->name }} </td>
                    <td class="border-r-2 border-black"> {{ $value->total_qty }} </td>
                    <td class="border-r-2 border-black"> {{ $value->total_amount }} </td>
                    <td class="border-r-2 border-black"> {{ $value->transaction_date }} </td>
                    <td class="border-r-2 border-black"> {{ $value->package_arrived }} </td>
                    <td class="border-r-2 border-black"> {{ $value->status }} </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
