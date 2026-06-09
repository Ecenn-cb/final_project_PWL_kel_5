<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th, td{
            border:1px solid black;
            padding:8px;
        }

        th{
            background:#f2f2f2;
        }

    </style>

</head>
<body>

<h2>Laporan Transaksi</h2>

<table>

    <thead>

        <tr>

            <th>Invoice</th>
            <th>Cabang</th>
            <th>Kasir</th>
            <th>Total</th>
            <th>Tanggal</th>

        </tr>

    </thead>

    <tbody>

        @foreach($transactions as $transaction)

        <tr>

            <td>{{ $transaction->invoice_number }}</td>

            <td>
                {{ $transaction->branch->branch_name ?? '-' }}
            </td>

            <td>
                {{ $transaction->cashier->name ?? '-' }}
            </td>

            <td>
                Rp {{ number_format($transaction->total_price,0,',','.') }}
            </td>

            <td>
                {{ $transaction->transaction_date }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>