<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Kasir
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div class="bg-blue-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Transaksi Hari Ini</h2>
                <p class="text-3xl font-bold">
                    {{ $todayTransactions ?? 0 }}
                </p>
            </div>

            <div class="bg-green-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Penjualan Hari Ini</h2>
                <p class="text-2xl font-bold">
                    Rp {{ number_format($todayRevenue ?? 0,0,',','.') }}
                </p>
            </div>

        </div>

        <!-- Tombol Cepat -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Menu Kasir
            </h2>

            <a href="{{ route('transactions.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                ➕ Transaksi Baru

            </a>

        </div>

        <!-- Riwayat Transaksi -->
        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Transaksi Terakhir Saya
            </h2>

            <table class="w-full border">

                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Invoice</th>
                        <th class="border p-2">Total</th>
                        <th class="border p-2">Tanggal</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($latestTransactions ?? [] as $transaction)

                    <tr>

                        <td class="border p-2">
                            {{ $transaction->invoice_number }}
                        </td>

                        <td class="border p-2">
                            Rp {{ number_format($transaction->total_price,0,',','.') }}
                        </td>

                        <td class="border p-2">
                            {{ $transaction->transaction_date }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="3"
                            class="border p-4 text-center">
                            Belum ada transaksi
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>