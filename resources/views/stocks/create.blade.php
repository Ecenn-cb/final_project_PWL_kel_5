<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Tambah Stok
    </h1>

    <form action="{{ route('stocks.store') }}" method="POST">

        @csrf

        <select name="branch_id"
            class="border w-full p-2 rounded mb-3">

            <option>Pilih Cabang</option>

            @foreach($branches as $branch)

                <option value="{{ $branch->id }}">
                    {{ $branch->branch_name }}
                </option>

            @endforeach

        </select>

        <select name="product_id"
            class="border w-full p-2 rounded mb-3">

            <option>Pilih Produk</option>

            @foreach($products as $product)

                <option value="{{ $product->id }}">
                    {{ $product->product_name }}
                </option>

            @endforeach

        </select>

        <input
            type="number"
            name="stock"
            class="border w-full p-2 rounded mb-3"
            placeholder="Jumlah Stok">

        <button
            class="bg-blue-500 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>

</div>

</x-app-layout>