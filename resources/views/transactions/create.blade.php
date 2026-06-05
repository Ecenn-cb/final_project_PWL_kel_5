<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Transaksi Penjualan
    </h1>

    @if(session('error'))
        <div class="bg-red-100 p-3 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('transactions.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Produk</label>

            <select
                name="product_id"
                class="border w-full p-2 rounded">

                @foreach($products as $product)

                    <option
                        value="{{ $product->id }}">

                        {{ $product->product_name }}
                        -
                        Rp {{ number_format($product->price) }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Qty</label>

            <input
                type="number"
                name="qty"
                min="1"
                class="border w-full p-2 rounded">

        </div>

        <button
            class="bg-blue-500 text-white px-4 py-2 rounded">

            Simpan Transaksi

        </button>

    </form>

</div>

</x-app-layout>