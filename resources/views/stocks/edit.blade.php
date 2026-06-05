<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Edit Stok
        </h1>

        <form
            action="{{ route('stocks.update', $stock->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            <!-- Cabang -->
            <div class="mb-3">
                <label class="block mb-1 font-medium">
                    Cabang
                </label>

                <select
                    name="branch_id"
                    class="border w-full p-2 rounded">

                    @foreach($branches as $branch)

                        <option
                            value="{{ $branch->id }}"
                            {{ $stock->branch_id == $branch->id ? 'selected' : '' }}>

                            {{ $branch->branch_name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <!-- Produk -->
            <div class="mb-3">
                <label class="block mb-1 font-medium">
                    Produk
                </label>

                <select
                    name="product_id"
                    class="border w-full p-2 rounded">

                    @foreach($products as $product)

                        <option
                            value="{{ $product->id }}"
                            {{ $stock->product_id == $product->id ? 'selected' : '' }}>

                            {{ $product->product_name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <!-- Jumlah Stok -->
            <div class="mb-3">
                <label class="block mb-1 font-medium">
                    Jumlah Stok
                </label>

                <input
                    type="number"
                    name="stock"
                    value="{{ $stock->stock }}"
                    class="border w-full p-2 rounded">
            </div>

            <button
                type="submit"
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">

                Update

            </button>

            <a href="{{ route('stocks.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded ml-2">

                Kembali

            </a>

        </form>

    </div>

</x-app-layout>