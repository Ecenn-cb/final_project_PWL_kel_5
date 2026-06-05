<x-app-layout>

<div class="p-6">

    <h1 class="text-2xl font-bold mb-4">
        Edit Produk
    </h1>

    <form
        action="{{ route('products.update', $product->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <select
            name="category_id"
            class="border w-full p-2 rounded mb-3">

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

                    {{ $category->category_name }}

                </option>

            @endforeach

        </select>

        <input
            type="text"
            name="product_code"
            value="{{ $product->product_code }}"
            class="border w-full p-2 rounded mb-3">

        <input
            type="text"
            name="product_name"
            value="{{ $product->product_name }}"
            class="border w-full p-2 rounded mb-3">

        <input
            type="number"
            name="price"
            value="{{ $product->price }}"
            class="border w-full p-2 rounded mb-3">

        <button
            class="bg-green-500 text-white px-4 py-2 rounded">

            Update

        </button>

    </form>

</div>

</x-app-layout>