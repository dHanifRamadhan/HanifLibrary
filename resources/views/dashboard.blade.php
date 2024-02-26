@extends('layout.app')

@section('title')
    Dashboard
@endsection

@section('main')
    {{-- Admin || Officer --}}
    @auth
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'officer')
            @include('admin.dashboard')
        @endif
    @endauth
    {{-- Admin || Officer --}}

    @if (Auth::check() != true || (Auth::check() && Auth::user()->role == 'librarian'))
        @include('home.dashboard')
    @endif

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <script>
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
    </script> --}}
@endsection
