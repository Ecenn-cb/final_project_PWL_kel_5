<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Gudang
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <!-- Informasi Gudang -->
        <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-xl shadow-lg p-6 mb-8">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold mb-3">
                        📦 Informasi Gudang
                    </h2>

                    <p class="text-lg">
                        <strong>Pegawai :</strong>
                        {{ auth()->user()->name }}
                    </p>

                    <p class="text-lg">
                        <strong>Cabang :</strong>
                        {{ auth()->user()->branch->branch_name }}
                    </p>

                </div>

                <div class="hidden md:block text-7xl opacity-20">
                    🏪
                </div>

            </div>

        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-blue-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Total Produk
                </h2>

                <p class="text-3xl font-bold">
                    {{ $totalProducts ?? 0 }}
                </p>

            </div>

            <div class="bg-green-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Total Stok Cabang
                </h2>

                <p class="text-3xl font-bold">
                    {{ $totalStocks ?? 0 }}
                </p>

            </div>

            <div class="bg-red-500 text-white rounded-lg shadow p-5">

                <h2 class="text-sm">
                    Barang Hampir Habis
                </h2>

                <p class="text-3xl font-bold">
                    {{ $lowStockCount ?? 0 }}
                </p>

            </div>

        </div>

        <!-- Menu Cepat -->
        <div class="bg-white rounded-xl shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Menu Gudang
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <a href="{{ route('stocks.index') }}"
                   class="bg-blue-100 hover:bg-blue-200 p-4 rounded-lg">

                    📦 Kelola Stok

                </a>

                <a href="{{ route('products.index') }}"
                   class="bg-green-100 hover:bg-green-200 p-4 rounded-lg">

                    🏷️ Lihat Produk

                </a>

            </div>

        </div>

        <!-- Barang Hampir Habis -->
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold text-red-600 mb-4">
                🚨 Barang Hampir Habis
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-gray-100">

                            <th class="border p-3 text-left">
                                Produk
                            </th>

                            <th class="border p-3 text-left">
                                Stok
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($lowStocks ?? [] as $stock)

                        <tr class="hover:bg-gray-50">

                            <td class="border p-3">
                                {{ $stock->product->product_name }}
                            </td>

                            <td class="border p-3 text-red-600 font-bold">
                                {{ $stock->stock }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="2"
                                class="border p-4 text-center text-gray-500">

                                Tidak ada stok menipis

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>