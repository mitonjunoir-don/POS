<x-layouts.app title="Edit Product">

    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}"
           class="text-sm font-medium text-ink-600 hover:text-ink-900">
            ← Back to Products
        </a>

        <h2 class="mt-3 text-2xl font-bold text-ink-900">
            Edit Product
        </h2>

        <p class="mt-1 text-sm text-ink-500">
            Update the product information below.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Please fix the following:</p>

            <ul class="mt-2 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('admin.products.update', $product) }}"
          class="rounded-xl border border-ink-100 bg-white p-6 shadow-sm">

        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Product Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $product->name) }}"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    SKU
                </label>

                <input type="text"
                       name="sku"
                       value="{{ old('sku', $product->sku) }}"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-ink-700">
                    Description
                </label>

                <textarea name="description"
                          rows="3"
                          class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Buying Price (KES)
                </label>

                <input type="number"
                       name="buying_price"
                       value="{{ old('buying_price', $product->buying_price) }}"
                       min="0"
                       step="0.01"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Selling Price (KES)
                </label>

                <input type="number"
                       name="selling_price"
                       value="{{ old('selling_price', $product->selling_price) }}"
                       min="0"
                       step="0.01"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Stock Quantity
                </label>

                <input type="number"
                       name="stock_quantity"
                       value="{{ old('stock_quantity', $product->stock_quantity) }}"
                       min="0"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Minimum Stock
                </label>

                <input type="number"
                       name="minimum_stock"
                       value="{{ old('minimum_stock', $product->minimum_stock) }}"
                       min="0"
                       required
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

            <div>
                <label class="block text-sm font-medium text-ink-700">
                    Category
                </label>

                <input type="text"
                       name="category"
                       value="{{ old('category', $product->category) }}"
                       class="mt-2 w-full rounded-lg border border-ink-200 px-4 py-3">
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button type="submit"
                    class="btn-primary">
                Update Product
            </button>

            <a href="{{ route('admin.products.index') }}"
               class="rounded-lg border border-ink-200 px-5 py-3 text-sm font-medium text-ink-700 hover:bg-ink-50">
                Cancel
            </a>

        </div>

    </form>

</x-layouts.app>