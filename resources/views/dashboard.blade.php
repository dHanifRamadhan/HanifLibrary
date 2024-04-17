@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('main')
    <div @class([
        'w-full h-full overflow-y-scroll',
        'py-4 px-5' =>
            Auth::check() != true ||
            (Auth::check() && Auth::user()->role == 'librarian'),
        'pt-[4rem] pl-60' => Auth::check() && Auth::user()->role != 'librarian',
    ])>
        @if (Auth::check() != true || (Auth::check() && Auth::user()->role == 'librarian'))
            @include('contents.dashboard')
        @elseif(Auth::check() && Auth::user()->role != 'librarian')
            @include('admin.dashboard')
        @endif
    </div>
@endsection
