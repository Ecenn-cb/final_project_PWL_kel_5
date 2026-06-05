<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Supervisor
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-blue-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Transaksi Hari Ini</h2>
                <p class="text-3xl font-bold">
                    {{ $todayTransactions ?? 0 }}
                </p>
            </div>

            <div class="bg-green-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Transaksi Bulan Ini</h2>
                <p class="text-3xl font-bold">
                    {{ $monthTransactions ?? 0 }}
                </p>
            </div>

            <div class="bg-yellow-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Pendapatan Hari Ini</h2>
                <p class="text-xl font-bold">
                    Rp {{ number_format($todayRevenue ?? 0,0,',','.') }}
                </p>
            </div>

        </div>

        <!-- Transaksi Terbaru -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Transaksi Terbaru
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

        <!-- Informasi Supervisor -->
        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Tugas Supervisor
            </h2>

            <ul class="list-disc pl-5 space-y-2 text-gray-700">
                <li>Mengawasi transaksi yang dilakukan kasir.</li>
                <li>Memastikan tidak ada transaksi yang mencurigakan.</li>
                <li>Memantau aktivitas penjualan cabang.</li>
                <li>Membantu Manager dalam pengawasan operasional toko.</li>
            </ul>

        </div>

    </div>

</x-app-layout>