<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Manager
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl shadow-lg p-6 mb-8">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-2xl font-bold mb-4">
                        🏪 Informasi Cabang
                    </h2>

                    <div class="space-y-2">

                        <p class="text-lg">
                            <span class="font-semibold">
                                Cabang :
                            </span>

                            {{ auth()->user()->branch->branch_name }}
                        </p>

                        <p class="text-lg">
                            <span class="font-semibold">
                                Manager :
                            </span>

                            {{ auth()->user()->name }}
                        </p>

                    </div>

                </div>

                <div class="hidden md:block text-7xl opacity-20">

                    🏬

                </div>

            </div>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-blue-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Total Produk</h2>
                <p class="text-3xl font-bold">
                    {{ $totalProducts ?? 0 }}
                </p>
            </div>

            <div class="bg-green-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Total Stok</h2>
                <p class="text-3xl font-bold">
                    {{ $totalStocks ?? 0 }}
                </p>
            </div>

            <div class="bg-yellow-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Transaksi Hari Ini</h2>
                <p class="text-3xl font-bold">
                    {{ $todayTransactions ?? 0 }}
                </p>
            </div>

            <div class="bg-red-500 text-white rounded-lg shadow p-5">
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

        <!-- Stok Menipis -->
        <div class="bg-white rounded-lg shadow p-6">

            <h2 class="text-xl font-bold text-red-600 mb-4">
                Stok Hampir Habis
            </h2>

            <table class="w-full border">

                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Produk</th>
                        <th class="border p-2">Stok</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($lowStocks ?? [] as $stock)

                    <tr>

                        <td class="border p-2">
                            {{ $stock->product->product_name }}
                        </td>

                        <td class="border p-2 text-red-600 font-bold">
                            {{ $stock->stock }}
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="2"
                            class="border p-4 text-center">
                            Tidak ada stok menipis
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>