@extends('layout.app')
@section('title')
    Category Update
@endsection
@section('preload')
    
@endsection
@section('main')
    <div class="mx-16 flex flex-col gap-5">
        <h1 class="text-2xl underline font-semibold">Category Update</h1>
        <form action="{{route('category.update', $data->id)}}" method="POST" class="">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-3">
                <label for="category" class="font-semibold mx-1">Category Name</label>
                <input type="text" id="category" name="category" class="border-0 bg-transparent py-1 border-b-2 border-black outline-none px-1" placeholder="{{$data->name}}">
            </div>
            <div class="flex items-center justify-center mt-10">
                <button type="submit" class="border-2 border-black rounded-md py-2 px-5 font-semibold hover:bg-slate-300">
                    Save
                </button>
            </div>
        </form>
    </div>
@endsection