@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="w-full h-full overflow-y-scroll py-4 px-5">
        @if (Auth::check() != true || (Auth::check() && Auth::user()->role == 'librarian'))
            @include('contents.dashboard')
        @endif
    </div>
@endsection
