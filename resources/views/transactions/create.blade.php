<x-app-layout>

    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">
            Transaksi Penjualan
        </h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-3">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transactions.store') }}"
              method="POST"
              class="bg-white shadow rounded p-6">

            @csrf

            <!-- Cabang -->
            @if(auth()->user()->role->role_name == 'Owner')

        <div class="mb-4">

            <label class="block mb-2 font-medium">
                Cabang
            </label>

            <select
                name="branch_id"
                class="border w-full p-2 rounded"
                required>

                @foreach($branches as $branch)

                    <option value="{{ $branch->id }}">
                        {{ $branch->branch_name }}
                    </option>

                @endforeach

            </select>

        </div>

    @endif

            <!-- Produk -->
            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Produk
                </label>

                <select
                    name="product_id"
                    class="border w-full p-2 rounded"
                    required>

                    <option value="">
                        -- Pilih Produk --
                    </option>

                    @foreach($products as $product)

                        <option value="{{ $product->id }}">
                            {{ $product->product_name }}
                            -
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Qty -->
            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Jumlah
                </label>

                <input
                    type="number"
                    name="qty"
                    min="1"
                    required
                    class="border w-full p-2 rounded">

            </div>

            <div class="flex gap-2">

                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">

                    Simpan Transaksi

                </button>

                <a href="{{ route('transactions.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</x-app-layout>