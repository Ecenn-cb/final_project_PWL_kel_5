<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Tambah Produk
    </h1>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <select
            name="category_id"
            class="border w-full p-2 rounded mb-3">

            <option>Pilih Kategori</option>

            @foreach($categories as $category)

                <option value="{{ $category->id }}">
                    {{ $category->category_name }}
                </option>

            @endforeach

        </select>

        <input
            type="text"
            name="product_code"
            placeholder="Kode Produk"
            class="border w-full p-2 rounded mb-3">

        <input
            type="text"
            name="product_name"
            placeholder="Nama Produk"
            class="border w-full p-2 rounded mb-3">

        <input
            type="number"
            name="price"
            placeholder="Harga"
            class="border w-full p-2 rounded mb-3">

        <button
            class="bg-blue-500 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>

</div>

</x-app-layout>