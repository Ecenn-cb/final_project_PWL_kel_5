<!DOCTYPE html>
<html>

<head>

    <title>Laporan Stok</title>

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

    <h2>Laporan Stok Barang</h2>

    <table>

        <thead>

            <tr>

                <th>Cabang</th>
                <th>Produk</th>
                <th>Stok</th>

            </tr>

        </thead>

        <tbody>

            @foreach($stocks as $stock)

            <tr>

                <td>
                    {{ $stock->branch->branch_name }}
                </td>

                <td>
                    {{ $stock->product->product_name }}
                </td>

                <td>
                    {{ $stock->stock }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>