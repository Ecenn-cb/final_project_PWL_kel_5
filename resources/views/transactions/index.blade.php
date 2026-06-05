<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between items-center mb-4">

            <h1 class="text-2xl font-bold">
                Data Transaksi
            </h1>

            <a href="{{ route('transactions.create') }}"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                Transaksi Baru

            </a>

        </div>

        @if(session('success'))

            <div class="bg-green-100 border border-green-400 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>

        @endif

        @if(session('error'))

            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>

        @endif

        <div class="bg-white rounded shadow overflow-hidden">

            <table class="w-full border">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="border p-2">
                            Invoice
                        </th>

                        <th class="border p-2">
                            Total
                        </th>

                        <th class="border p-2">
                            Tanggal
                        </th>

                        <th class="border p-2">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($transactions as $transaction)

                        <tr>

                            <td class="border p-2">
                                {{ $transaction->invoice_number }}
                            </td>

                            <td class="border p-2">
                                Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                            </td>

                            <td class="border p-2">
                                {{ $transaction->transaction_date }}
                            </td>

                            <td class="border p-2">

                                <a href="{{ route('transactions.show', $transaction->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="text-center p-4">

                                Belum ada transaksi

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>