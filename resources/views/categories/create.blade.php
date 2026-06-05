<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Tambah Kategori
    </h1>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <input
            type="text"
            name="category_name"
            placeholder="Nama Kategori"
            class="border w-full p-2 rounded">

        <button
            class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">

            Simpan

        </button>

    </form>

</div>

</x-app-layout>