<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between items-center mb-4">

            <h1 class="text-2xl font-bold">
                Laporan Stok
            </h1>

            <a href="{{ route('reports.stocks.pdf') }}"
               class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">

                📄 Cetak PDF

            </a>

        </div>

        <div class="bg-white rounded shadow overflow-hidden">

            <table class="w-full border">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="border p-2">
                            Cabang
                        </th>

                        <th class="border p-2">
                            Produk
                        </th>

                        <th class="border p-2">
                            Stok
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($stocks as $stock)

                        <tr>

                            <td class="border p-2">
                                {{ $stock->branch->branch_name }}
                            </td>

                            <td class="border p-2">
                                {{ $stock->product->product_name }}
                            </td>

                            <td class="border p-2">
                                {{ $stock->stock }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3"
                                class="text-center p-4">

                                Tidak ada data stok

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>