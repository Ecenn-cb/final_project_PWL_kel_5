<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Edit Kategori
    </h1>

    <form
        action="{{ route('categories.update', $category->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <input
            type="text"
            name="category_name"
            value="{{ $category->category_name }}"
            class="border w-full p-2 rounded">

        <button
            class="bg-green-500 text-white px-4 py-2 mt-4 rounded">

            Update

        </button>

    </form>

</div>

</x-app-layout>