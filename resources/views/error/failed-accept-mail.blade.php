@extends('layouts.app')
@section('title')
    Failed Mails
@endsection
@section('main')
    <div class="flex flex-col items-center gap-10">
        <h1 class="text-xl">Your account verification deadline has expired!. Please resend your email</h1>
        <form action="{{route('auth.failed.mail')}}" method="POST">
            @csrf
            <input type="hidden" name="ashdkaufgkfkfskuagfkbfadfhaehfaieufhsdufa" value="{{$data}}">
            <button class="border border-slate-800 rounded px-3 py-2 hover:bg-sky-500 hover:text-slate-50 hover:border-sky-600">
                Re-send accept email
            </button>
        </form>
    </div>
@endsection