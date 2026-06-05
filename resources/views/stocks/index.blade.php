<x-app-layout>

<div class="p-6">

    <div class="flex justify-between mb-4">

        <h1 class="text-2xl font-bold">
            Data Stok
        </h1>

        <a href="{{ route('stocks.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded">

            Tambah Stok

        </a>

    </div>

    @if(session('success'))
        <div class="bg-green-100 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border">

        <thead>

            <tr class="bg-gray-200">

                <th class="border p-2">Cabang</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Jumlah</th>
                <th class="border p-2">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @foreach($stocks as $stock)

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

                <td class="border p-2">

                    <a href="{{ route('stocks.edit',$stock->id) }}"
                       class="bg-yellow-500 text-white px-2 py-1 rounded">

                        Edit

                    </a>

                    <form
                        action="{{ route('stocks.destroy',$stock->id) }}"
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