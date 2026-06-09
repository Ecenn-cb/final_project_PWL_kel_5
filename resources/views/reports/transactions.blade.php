<x-app-layout>

    <div class="max-w-7xl mx-auto py-6 px-4">

        <!-- Header -->
        <div class="mb-6">

            <h1 class="text-3xl font-bold text-gray-800">
                📊 Laporan Transaksi
            </h1>

            <p class="text-gray-500 mt-1">
                Monitoring seluruh transaksi Mini Market Jayusman
            </p>

        </div>

        <!-- Filter Card -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-6">

            <form method="GET"
                  action="{{ route('reports.transactions') }}">

                <div class="grid md:grid-cols-4 gap-4">

                    <div>
                        <label class="block text-sm font-semibold mb-2">
                            Tanggal Awal
                        </label>

                        <input type="date"
                               name="start_date"
                               value="{{ request('start_date') }}"
                               class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2">
                            Tanggal Akhir
                        </label>

                        <input type="date"
                               name="end_date"
                               value="{{ request('end_date') }}"
                               class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200">
                    </div>

                    <div class="flex items-end">
                        <button
                            type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg w-full">

                            🔍 Filter

                        </button>
                    </div>

                    <div class="flex items-end">

                        <a href="{{ route('reports.transactions.pdf',[
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date')
                        ]) }}"
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg text-center w-full">

                            📄 Cetak PDF

                        </a>

                    </div>

                </div>

            </form>

        </div>

        <!-- Statistik -->
        <div class="grid md:grid-cols-3 gap-4 mb-6">

            <div class="bg-blue-500 text-white p-5 rounded-xl shadow">

                <p class="text-sm">
                    Total Transaksi
                </p>

                <h2 class="text-3xl font-bold">
                    {{ $transactions->count() }}
                </h2>

            </div>

            <div class="bg-green-500 text-white p-5 rounded-xl shadow">

                <p class="text-sm">
                    Total Pendapatan
                </p>

                <h2 class="text-2xl font-bold">
                    Rp {{ number_format($transactions->sum('total_price'),0,',','.') }}
                </h2>

            </div>

            <div class="bg-yellow-500 text-white p-5 rounded-xl shadow">

                <p class="text-sm">
                    Periode
                </p>

                <h2 class="text-lg font-bold">
                    {{ request('start_date') ?? 'Semua Data' }}
                </h2>

            </div>

        </div>

        <!-- Tabel -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">

            <div class="bg-gray-100 px-6 py-4 border-b">

                <h2 class="font-semibold text-gray-700">
                    Daftar Transaksi
                </h2>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-50 text-gray-700">

                            <th class="p-3 text-left">
                                Invoice
                            </th>

                            <th class="p-3 text-left">
                                Cabang
                            </th>

                            <th class="p-3 text-left">
                                Kasir
                            </th>

                            <th class="p-3 text-left">
                                Total
                            </th>

                            <th class="p-3 text-left">
                                Tanggal
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($transactions as $transaction)

                        <tr class="border-t hover:bg-gray-50">

                            <td class="p-3 font-medium">
                                {{ $transaction->invoice_number }}
                            </td>

                            <td class="p-3">
                                {{ $transaction->branch->branch_name ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $transaction->cashier->name ?? '-' }}
                            </td>

                            <td class="p-3 text-green-600 font-semibold">
                                Rp {{ number_format($transaction->total_price,0,',','.') }}
                            </td>

                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y H:i') }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-8 text-gray-500">

                                Tidak ada data transaksi

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>