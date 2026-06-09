<x-app-layout>

    <div class="py-6 px-6">

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-2">
            Dashboard Kasir
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <!-- Informasi Kasir -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl shadow-lg p-6 mb-8">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold mb-3">
                        🛒 Informasi Kasir
                    </h2>

                    <p class="text-lg">
                        <strong>Nama :</strong>
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-lg">
                        <strong>Cabang :</strong>
                        {{ auth()->user()->branch->branch_name }}
                    </p>

                </div>

                <div class="hidden md:block text-7xl opacity-20">
                    💳
                </div>

            </div>

        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-blue-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Transaksi Hari Ini
                </h2>

                <p class="text-3xl font-bold">
                    {{ $todayTransactions ?? 0 }}
                </p>

            </div>

            <div class="bg-green-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Penjualan Hari Ini
                </h2>

                <p class="text-xl font-bold">
                    Rp {{ number_format($todayRevenue ?? 0,0,',','.') }}
                </p>

            </div>

            <div class="bg-yellow-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Transaksi Bulan Ini
                </h2>

                <p class="text-3xl font-bold">
                    {{ $monthTransactions ?? 0 }}
                </p>

            </div>

            <div class="bg-purple-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Penjualan Bulan Ini
                </h2>

                <p class="text-xl font-bold">
                    Rp {{ number_format($monthRevenue ?? 0,0,',','.') }}
                </p>

            </div>

        </div>

        <!-- Menu Cepat -->
        <div class="bg-white rounded-xl shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Menu Kasir
            </h2>

            <div class="flex gap-4">

                <a href="{{ route('transactions.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg">

                    ➕ Transaksi Baru

                </a>

                <a href="{{ route('transactions.index') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

                    📋 Riwayat Transaksi

                </a>

            </div>

        </div>

        <!-- Riwayat Transaksi -->
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-4">
                Transaksi Terakhir Saya
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="border p-3 text-left">
                                Invoice
                            </th>

                            <th class="border p-3 text-left">
                                Total
                            </th>

                            <th class="border p-3 text-left">
                                Tanggal
                            </th>

                            <th class="border p-3 text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($latestTransactions ?? [] as $transaction)

                        <tr class="hover:bg-gray-50">

                            <td class="border p-3">
                                {{ $transaction->invoice_number }}
                            </td>

                            <td class="border p-3 text-green-600 font-semibold">
                                Rp {{ number_format($transaction->total_price,0,',','.') }}
                            </td>

                            <td class="border p-3">
                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y H:i') }}
                            </td>

                            <td class="border p-3 text-center">

                                <a href="{{ route('transactions.show', $transaction->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4"
                                class="border p-4 text-center text-gray-500">

                                Belum ada transaksi

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>