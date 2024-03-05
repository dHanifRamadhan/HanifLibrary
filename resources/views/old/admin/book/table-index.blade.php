<table class="w-full border-2 border-slate-600" id="special">
    <thead class="bg-slate-200 border-b-2 border-slate-600">
        <tr class="text-sm">
            <th class="border-r-2 border-slate-600 py-2">No</th>
            <th class="border-r-2 border-slate-600">Title</th>
            <th class="border-r-2 border-slate-600">Book</th>
            <th class="border-r-2 border-slate-600">Category</th>
            <th class="border-r-2 border-slate-600">Author</th>
            <th class="border-r-2 border-slate-600">Publisher</th>
            <th class="border-r-2 border-slate-600">Year Published</th>
            <th class="border-r-2 border-slate-600">Quantity</th>
            <th class="border-r-2 border-slate-600">Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($data as $key => $value)
            <tr class="border-b-2 border-slate-600 text-xs">
                <td class="border-r-2 border-slate-600 py-2"> {{ $key + 1 }} </td>
                <td class="border-r-2 border-slate-600"> {{ $value->title }} </td>
                <td class="border-r-2 border-slate-600">
                    <div class="h-full w-full flex items-center justify-center py-3">
                        <div class="relative w-20 h-28 flex">
                            <div class="w-1/6 h-5/6 rounded-tl-3xl"
                                style="background-color: {{ $value->cover_right_color }}"></div>
                            <div class="w-5/6 h-5/6 rounded-tr-lg flex items-start justify-center"
                                style="background-color: {{ $value->cover_color }}">
                                <img src="{{ asset('storage/' . $value->picture) }}" alt="" class="rounded-tr-lg">
                            </div>
                            <div class="absolute bottom-2 right-0 left-0 h-1/6 rounded-l-2xl"
                                style="background-color: #1E293B">
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
                <td class="border-r-2 border-slate-600">
                    @foreach (explode(',', $value->category_name) as $value_category)
                        <span>
                            {{ $value_category }}
                        </span> <br>
                    @endforeach
                </td>
                <td class="border-r-2 border-slate-600"> {{ $value->author }} </td>
                <td class="border-r-2 border-slate-600"> {{ $value->publisher }} </td>
                <td class="border-r-2 border-slate-600"> {{ $value->year_published }} </td>
                <td class="border-r-2 border-slate-600"> {{ $value->qty }} </td>
                <td class="border-r-2 border-slate-600"> {{ $value->status }} </td>
                <td>
                    <form action="" method="POST" class="w-full h-full flex flex-col gap-5 items-center justify-center">
                        <a href="{{ route('book.show', $value->id) }}" class="text-yellow-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                <path d="M16 5l3 3" />
                            </svg>
                        </a>
                        <button type="submit" class="text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash"
                                width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
