<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verified</title>
    <link rel="icon" href="{{ asset('images/icon-books-regis.png') }}">
    <link rel="preload" href="{{ asset('images/icon-books-regis.png') }}" as="">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col items-center justify-center w-screen h-screen bg-slate-100 relative max-lg:hidden gap-10">
    <span class="text-3xl font-semibold">{{$message}} !!</span>
    <a href="{{route('auth.login')}}" class="font-bold border-2 border-black py-4 px-10 rounded-md">
        Back Login
    </a>
</body>
</html>