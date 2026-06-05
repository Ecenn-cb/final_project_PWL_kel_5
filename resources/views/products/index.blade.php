<x-app-layout>

<div class="p-6">

    <div class="flex justify-between mb-4">

        <h1 class="text-2xl font-bold">
            Data Produk
        </h1>

        <a href="{{ route('products.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded">

            Tambah Produk

        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 p-3 mb-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-200">

                <th class="border p-2">Kode</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Kategori</th>
                <th class="border p-2">Harga</th>
                <th class="border p-2">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @foreach($products as $product)

            <tr>

                <td class="border p-2">
                    {{ $product->product_code }}
                </td>

                <td class="border p-2">
                    {{ $product->product_name }}
                </td>

                <td class="border p-2">
                    {{ $product->category->category_name }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($product->price) }}
                </td>

                <td class="border p-2">

                    <a href="{{ route('products.edit', $product->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">

                        Edit

                    </a>

                    <form
                        action="{{ route('products.destroy', $product->id) }}"
                        method="POST"
                        class="inline">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Yakin hapus?')"
                            class="bg-red-500 text-white px-2 py-1 rounded">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>