<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">
            Laporan
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <a href="{{ route('reports.transactions') }}"
               class="bg-blue-500 text-white p-5 rounded shadow">

                📊 Laporan Transaksi

            </a>

            <a href="{{ route('reports.stocks') }}"
               class="bg-green-500 text-white p-5 rounded shadow">

                📦 Laporan Stok

            </a>

        </div>

    </div>

</x-app-layout>