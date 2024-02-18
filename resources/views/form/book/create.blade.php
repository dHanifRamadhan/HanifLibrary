@extends('layout.app')
@section('title')
    Books Create
@endsection
@section('preload')
    <style>
        .mult-select-tag {
            display: flex;
            width: 100%;
            flex-direction: column;
            margin-left: 0.55rem;
            position: relative;
            --border-color: rgb(218, 221, 224);
            font-family: Verdana, sans-serif;
        }

        .mult-select-tag .wrapper {
            width: 15rem;
        }

        .mult-select-tag .body {
            display: flex;
            border-bottom: 2px solid #000;
            background: transparent;
            min-height: 2.15rem;
            width: 100%;
            min-width: 14rem;

        }

        .mult-select-tag .input-container {
            display: flex;
            flex-wrap: wrap;
            flex: 1 1 auto;
            padding: 0.1rem;
            align-items: center;
        }

        .mult-select-tag .input-body {
            display: flex;
            width: 100%;
        }

        .mult-select-tag .input {
            flex: 1;
            background: transparent;
            border-radius: 0.25rem;
            padding: 0.45rem;
            margin: 10px;
            color: #2d3748;
            outline: 0;
            border: 1px solid var(--border-color);
        }

        .mult-select-tag .btn-container {
            color: #e2eBf0;
            padding: 0.5rem;
            display: flex;
        }

        .mult-select-tag button {
            cursor: pointer;
            width: 100%;
            color: #718096;
            outline: 0;
            height: 100%;
            border: none;
            padding: 0;
            background: transparent;
            background-image: none;
            -webkit-appearance: none;
            text-transform: none;
            margin: 0;
        }

        .mult-select-tag button:first-child {
            width: 1rem;
            height: 90%;
        }


        .mult-select-tag .drawer {
            position: absolute;
            background-color: rgb(241 245 249);
            max-height: 15rem;
            z-index: 40;
            top: 98%;
            width: 100%;
            overflow-y: scroll;
        }

        .mult-select-tag ul {
            list-style-type: none;
            padding: 0.5rem;
            margin: 0;
        }

        .mult-select-tag ul li {
            padding: 0.5rem;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        .mult-select-tag ul li:hover {
            background-color: rgb(148 163 184);
            color: #fff;
        }

        .mult-select-tag .item-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.2rem 0.4rem;
            margin: 0.2rem;
            font-weight: 500;
        }

        .mult-select-tag .item-label {
            max-width: 100%;
            line-height: 1;
            font-size: 0.75rem;
            font-weight: 400;
            flex: 0 1 auto;
        }

        .mult-select-tag .item-close-container {
            display: flex;
            flex: 1 1 auto;
            flex-direction: row-reverse;
        }

        .mult-select-tag .item-close-svg {
            width: 1rem;
            margin-left: 0.5rem;
            height: 1rem;
            cursor: pointer;
            display: block;
        }

        .hidden {
            display: none;
        }

        .mult-select-tag .shadow {}

        .mult-select-tag .rounded {
            border-radius: 0;
        }
    </style>
@endsection
@section('main')
    <div class="mx-16 flex mb-4">
        <h1 class="font-semibold text-2xl ">Created Book</h1>
    </div>
    <div class="mx-16 flex">
        <div class="py-10 pt-20 px-16 flex items-center justify-center">
            <div class="scale-150 h-max w-max flex items-center justify-center py-3">
                <div class="relative w-44 h-60 flex pb-8">
                    <div class="w-5 rounded-tl-xl" style="background-color: #475569;" id="cover_right_color"></div>
                    <div class="w-4/5 rounded-tr-xl flex items-start justify-end pb-2" style="background-color: #64748B;"
                        id="cover_color">
                        <img src="" class="w-full h-full rounded-tr-lg hidden" alt="" id="cover_image">
                    </div>
                    <div class="absolute bottom-5 right-[0.95rem] left-0 rounded-lg h-6" style="background-color: #1E293B;"
                        id="cover_bottom_color">
                        <div class="relative w-full h-full flex items-center pl-4 pr-1">
                            <div class="h-4 w-full bg-slate-200 bg-opacity-90 rounded-md flex flex-col gap-[0.20rem] py-1">
                                <hr class="border-slate-400">
                                <hr class="border-slate-400">
                                <hr class="border-slate-400">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="{{ request()->routeIs('book.create') ? route('book.store') : route('book.update', $data->id) }}"
            method="POST" class="w-full h-max" enctype="multipart/form-data">
            @csrf
            <div class=" grid grid-cols-2 gap-3">
                <div class="col-span-2 py-4 px-5 relative flex">
                    <input type="text" name="title" id="title"
                        class="bg-transparent outline-none border-b-2 border-black py-2 px-1 text-2xl font-semibold text-center"
                        required value="{{ request()->routeIs('book.create') ? '' : $data->title }}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="author" class="font-semibold">Author :</label>
                    <input type="text" name="author" id="author"
                        class="mx-2 mr-28 outline-none bg-transparent border-b-2 border-black" required
                        value="{{ request()->routeIs('book.create') ? '' : $data->author }}">
                </div>
                <div class="flex gap-2 justify-end">
                    <label for="" class="font-semibold">Year Published :</label>
                    <input type="date" name="year_published" class="bg-transparent h-max mx-2 outline-none" required
                        value="{{ request()->routeIs('book.create') ? '' : $data->year_published }}">
                </div>
                <div class="col-span-2 flex flex-col gap-1">
                    <label for="publisher" class="font-semibold">Publisher :</label>
                    <input type="text" name="publisher" id="publisher"
                        value="{{ request()->routeIs('book.create') ? '' : $data->publisher }}"
                        class="bg-transparent outline-none border-b-2 border-black mx-2 mr-[29.8rem]" required>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="category" class="font-semibold">Category :</label>
                    <select name="category[]" id="category" multiple>
                        @foreach ($categories as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col items-end gap-1 px-2">
                    <label for="stock" class="font-semibold">Stock :</label>
                    <input type="number" name="qty" id="stock"
                        value="{{ request()->routeIs('book.create') ? '' : $data->qty }}"
                        class="bg-transparent outline-none border-b-2 border-black text-right" required>
                </div>
                <div class="col-span-2 flex flex-col gap-3 mt-1">
                    <div class="flex gap-5">
                        <label for="cover" class="font-semibold">Cover :</label>
                        <input type="text" placeholder="#" name="cover" id="cover"
                            value="{{ request()->routeIs('book.create') ? '' : $data->cover }}"
                            class="bg-transparent outline-none border-b-2 border-black">
                    </div>
                    <div class="flex gap-5">
                        <label for="cover_right" class="font-semibold">Cover Right :</label>
                        <input type="text" placeholder="#" name="cover_right_color" id="cover_right"
                            value="{{ request()->routeIs('book.create') ? '' : $data->cover_right_color }}"
                            class="bg-transparent outline-none border-b-2 border-black">
                    </div>
                    <div class="flex gap-5">
                        <label for="cover_bottom" class="font-semibold">Cover Bottom :</label>
                        <input type="text" placeholder="#" name="cover_bottom_color" id="cover_bottom"
                            value="{{ request()->routeIs('book.create') ? '' : $data->cover_bottom_color }}"
                            class="bg-transparent outline-none border-b-2 border-black">
                    </div>
                    @if (request()->routeIs('book.create'))
                        <div class="flex mt-4 gap-5">
                            <label for="picture" class="font-semibold">Picture :</label>
                            <input type="file" placeholder="" name="picture" id="picture"
                                class="bg-transparent outline-none border-b-2 border-black" required>
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex gap-5 items-center justify-center my-20">
                <a href=""
                    class="border-2 border-black rounded-md py-2 px-5 font-semibold flex gap-4 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 14l-4 -4l4 -4" />
                        <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
                    </svg>
                    Back
                </a>
                <button type="submit"
                    class="border-2 border-black py-2 px-5 rounded-md font-semibold flex gap-4 items-center">
                    Save
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-svelte"
                        width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M15 8l-5 3l.821 -.495c1.86 -1.15 4.412 -.49 5.574 1.352a3.91 3.91 0 0 1 -1.264 5.42l-5.053 3.126c-1.86 1.151 -4.312 .591 -5.474 -1.251a3.91 3.91 0 0 1 1.263 -5.42l.26 -.16" />
                        <path
                            d="M8 17l5 -3l-.822 .496c-1.86 1.151 -4.411 .491 -5.574 -1.351a3.91 3.91 0 0 1 1.264 -5.42l5.054 -3.127c1.86 -1.15 4.311 -.59 5.474 1.252a3.91 3.91 0 0 1 -1.264 5.42l-.26 .16" />
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('category', {
            rounded: true, // default true
            shadow: false, // default false
            placeholder: 'Search', // default Search...
            tagColor: {
                textColor: '#327b2c',
                borderColor: '#92e681',
                bgColor: '#eaffe6',
            },
            onChange: function(values) {
                console.log(values)
            }
        })

        document.getElementById("cover").addEventListener('input', function(e) {
            var input = e.target.value;
            var color = document.getElementById('cover_color')

            var sanitizedInput = input.replace(/\s+/g, '');

            if (!sanitizedInput.startsWith('#')) {
                sanitizedInput = '#' + sanitizedInput;
            }

            e.target.value = sanitizedInput;

            color.style.backgroundColor = sanitizedInput;
        })

        document.getElementById('cover_right').addEventListener('input', function(e) {
            var input = e.target.value
            var color = document.getElementById('cover_right_color')

            var validasi = input.replace(/\s+/g, '')

            if (!validasi.startsWith('#')) {
                validasi = '#' + validasi
            }

            e.target.value = validasi;
            color.style.backgroundColor = validasi
        })

        document.getElementById('cover_bottom').addEventListener('input', function(e) {
            var input = e.target.value
            var color = document.getElementById('cover_bottom_color')

            var validasi = input.replace(/\s+/g, '')
            if (!validasi.startsWith('#')) {
                validasi = '#' + validasi
            }

            e.target.value = validasi
            color.style.backgroundColor = validasi
        })

        document.getElementById("picture").addEventListener('input', function(e) {
            var file = e.target.files[0]
            var preview = document.getElementById('cover_image')

            if (file) {
                var reader = new FileReader()
                reader.onloadend = function() {
                    preview.src = reader.result
                    preview.classList.remove('hidden')
                }
                reader.readAsDataURL(file)
            } else {
                preview.src = ''
                preview.classList.add('hidden')
            }
        })
    </script>
@endsection
