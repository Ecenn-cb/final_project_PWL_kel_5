<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Supervisor
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-l-8 border-yellow-500">

            <div class="flex items-center">

                <div class="bg-yellow-100 p-4 rounded-full mr-4">
                    <span class="text-3xl">
                        👨‍💼
                    </span>
                </div>

                <div>

                    <h2 class="text-xl font-bold text-gray-800">
                        {{ auth()->user()->branch->branch_name }}
                    </h2>

                    <p class="text-gray-500">
                        Supervisor Cabang
                    </p>

                    <p class="mt-2 font-semibold text-yellow-600">
                        {{ auth()->user()->name }}
                    </p>

                </div>

            </div>

        </div>

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

        <div class="bg-white rounded-lg shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Kasir Teraktif Hari Ini
            </h2>

            <table class="w-full border">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="border p-2">
                            Nama Kasir
                        </th>

                        <th class="border p-2">
                            Total Transaksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($topCashiers ?? [] as $cashier)

                        <tr>

                            <td class="border p-2">
                                {{ $cashier->name }}
                            </td>

                            <td class="border p-2">
                                {{ $cashier->transactions_count }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2"
                                class="text-center p-4">

                                Belum ada data

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