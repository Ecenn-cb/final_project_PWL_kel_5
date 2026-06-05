<x-app-layout>

    <div class="py-6 px-6">

        <h1 class="text-3xl font-bold mb-2">
            Dashboard Gudang
        </h1>

        <p class="text-gray-600 mb-6">
            Selamat datang, {{ auth()->user()->name }}
        </p>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

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

            <div class="bg-red-500 text-white rounded-lg shadow p-5">
                <h2 class="text-sm">Barang Hampir Habis</h2>
                <p class="text-3xl font-bold">
                    {{ $lowStockCount ?? 0 }}
                </p>
            </div>

        </div>

        <!-- Stok Menipis -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">

            <h2 class="text-xl font-bold text-red-600 mb-4">
                Barang Hampir Habis
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

        <!-- Akses Cepat -->
        <div class="bg-white rounded-lg shadow p-6">

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

    </div>

</x-app-layout>