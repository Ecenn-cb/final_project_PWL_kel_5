<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Data Transaksi
    </h1>

    <a href="{{ route('transactions.create') }}"
       class="bg-blue-500 text-white px-4 py-2 rounded">

       Transaksi Baru

    </a>

    <table class="w-full border mt-4">

        <thead>

            <tr>

                <th class="border p-2">
                    Invoice
                </th>

                <th class="border p-2">
                    Total
                </th>

                <th class="border p-2">
                    Tanggal
                </th>

            </tr>

        </thead>

        <tbody>

        @foreach($transactions as $transaction)

            <tr>

                <td class="border p-2">
                    {{ $transaction->invoice_number }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($transaction->total_price) }}
                </td>

                <td class="border p-2">
                    {{ $transaction->transaction_date }}
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>