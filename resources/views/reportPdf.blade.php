<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Cetak Transaksi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .letterhead {
            text-align: center;
            background-color: #708090;
            color: #000;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            border-radius: 10px 10px 0 0;
        }

        .logo {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            max-width: 50px;
            max-height: 50px;
        }

        .letterhead h3 {
            margin: 0;
        }

        .letterhead p {
            margin: 5px 0 0;
        }

        .line {
            border-top: 2px solid #fff;
            margin-top: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border-radius: 0 0 10px 10px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="letterhead">
            <h3>Hanif Library</h3>
            <p> {{ Auth::user()->name }} </p>
            <div class="line"></div>
        </div>
        <h2>Laporan Data Transaksi</h2>
        <table>
            <thead>
                <tr>
                    <th>No Transaction</th>
                    <th>Name User</th>
                    <th>Total Quantity</th>
                    <th>Total Price</th>
                    <th>Transaction Date</th>
                    <th>Package Arrived</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $i => $v)
                <tr>
                    <td>
                        @php
                            $date = Carbon\Carbon::createFromFormat('Y-m-d', $v->transaction_date);
                        @endphp
                        NFB{{ $date->format('Ymd') . $v->id }}
                    </td>
                    <td> {{ $v->name }} </td>
                    <td> {{ $v->total_qty }} </td>
                    <td> {{ $v->total_amount }} </td>
                    <td> {{ $v->transaction_date }} </td>
                    <td> {{ $v->package_arrived }} </td>
                    <td> {{ $v->status }} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
