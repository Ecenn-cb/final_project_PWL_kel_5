<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Market Jayusman</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold">
                Mini Market Jayusman
            </h1>

            <div>
                @auth
                    <a href="{{ route('dashboard') }}"
                       class="bg-white text-blue-600 px-4 py-2 rounded">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="bg-white text-blue-600 px-4 py-2 rounded">
                        Login Pegawai
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-white">
        <div class="container mx-auto px-6 py-20 text-center">

            <h2 class="text-5xl font-bold text-gray-800 mb-4">
                Sistem Informasi Mini Market Jayusman
            </h2>

            <p class="text-lg text-gray-600 mb-8">
                Mengelola transaksi dan stok barang dari seluruh cabang
                secara terpusat, cepat, dan akurat.
            </p>

            <a href="{{ route('login') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Masuk Sistem
            </a>

        </div>
    </section>

    <!-- Tentang -->
    <section class="py-16">
        <div class="container mx-auto px-6">

            <h3 class="text-3xl font-bold text-center mb-10">
                Tentang Kami
            </h3>

            <p class="text-center text-gray-600 max-w-4xl mx-auto">
                Mini Market Jayusman memiliki beberapa cabang yang tersebar
                di berbagai kota. Sistem ini dibangun untuk membantu
                pemantauan transaksi, pengelolaan stok barang, dan pelaporan
                secara real-time sehingga pemilik usaha dapat mengawasi
                seluruh cabang kapan saja dan dari mana saja.
            </p>

        </div>
    </section>

    <!-- Fitur -->
    <section class="bg-white py-16">
        <div class="container mx-auto px-6">

            <h3 class="text-3xl font-bold text-center mb-10">
                Fitur Sistem
            </h3>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold mb-2">
                        Manajemen Produk
                    </h4>
                    <p class="text-gray-600">
                        Mengelola data barang dan kategori produk.
                    </p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold mb-2">
                        Transaksi Penjualan
                    </h4>
                    <p class="text-gray-600">
                        Mencatat transaksi penjualan setiap cabang.
                    </p>
                </div>

                <div class="bg-gray-100 p-6 rounded-lg shadow">
                    <h4 class="text-xl font-bold mb-2">
                        Monitoring Stok
                    </h4>
                    <p class="text-gray-600">
                        Memantau stok barang seluruh cabang secara real-time.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Cabang -->
    <section class="py-16">
        <div class="container mx-auto px-6">

            <h3 class="text-3xl font-bold text-center mb-10">
                Cabang Mini Market
            </h3>

            <div class="grid md:grid-cols-5 gap-4 text-center">

                <div class="bg-white shadow p-4 rounded">
                    Medan
                </div>

                <div class="bg-white shadow p-4 rounded">
                    Binjai
                </div>

                <div class="bg-white shadow p-4 rounded">
                    Tebing Tinggi
                </div>

                <div class="bg-white shadow p-4 rounded">
                    Kisaran
                </div>

                <div class="bg-white shadow p-4 rounded">
                    Pematangsiantar
                </div>

            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white text-center py-4">
        © {{ date('Y') }} Mini Market Jayusman
    </footer>

</body>
</html>