<x-app-layout>

    <div class="p-6">

        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">
                Data Kategori
            </h1>

            <a href="{{ route('categories.create') }}"
               class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Kategori
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
                    <th class="border p-2">No</th>
                    <th class="border p-2">Nama Kategori</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)

                <tr>

                    <td class="border p-2">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $category->category_name }}
                    </td>

                    <td class="border p-2">

                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="bg-yellow-500 text-white px-2 py-1 rounded">
                            Edit
                        </a>

                        <form
                            action="{{ route('categories.destroy', $category->id) }}"
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