<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Detail Transaksi
        </h1>

        <div class="bg-white p-4 rounded shadow mb-4">

            <p>
                <strong>Invoice:</strong>
                {{ $transaction->invoice_number }}
            </p>

            <p>
                <strong>Cabang:</strong>
                {{ $transaction->branch->branch_name }}
            </p>

            <p>
                <strong>Kasir:</strong>
                {{ $transaction->cashier->name }}
            </p>

            <p>
                <strong>Tanggal:</strong>
                {{ $transaction->transaction_date }}
            </p>

        </div>

        <div class="bg-white p-4 rounded shadow">

            <table class="w-full border">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="border p-2">
                            Produk
                        </th>

                        <th class="border p-2">
                            Qty
                        </th>

                        <th class="border p-2">
                            Harga
                        </th>

                        <th class="border p-2">
                            Subtotal
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach(
                        $transaction->details
                        as $detail
                    )

                    <tr>

                        <td class="border p-2">
                            {{ $detail->product->product_name }}
                        </td>

                        <td class="border p-2">
                            {{ $detail->qty }}
                        </td>

                        <td class="border p-2">
                            Rp {{ number_format($detail->price) }}
                        </td>

                        <td class="border p-2">
                            Rp {{ number_format($detail->subtotal) }}
                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="mt-4 text-right">

                <strong>
                    Total :
                    Rp {{ number_format(
                        $transaction->total_price
                    ) }}
                </strong>

            </div>

        </div>

    </div>

</x-app-layout>