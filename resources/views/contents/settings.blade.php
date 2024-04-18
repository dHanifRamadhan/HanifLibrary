@extends('layouts.app')
@section('title')
    Settings
@endsection
@section('main')
    <div class="w-screen h-screen flex items-center justify-center">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="py-3 px-5 bg-slate-600 text-slate-100 rounded-md">
                Logout
            </button>
        </form>
    </div>
@endsection
