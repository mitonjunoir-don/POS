<x-layouts.app title="Products">

    <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h2 class="text-2xl font-bold text-ink-900">
                Products
            </h2>

            <p class="mt-1 text-sm text-ink-500">
                Manage your products and inventory.
            </p>
        </div>

        <a href="{{ route('admin.products.create') }}"
           class="btn-primary">
            + Add Product
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-50 px-4 py-3 text-sm font-medium text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-xl border border-ink-100 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-ink-100 bg-ink-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Product
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            SKU
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Category
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Selling Price
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Stock
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Status
                        </th>

                        <th class="px-6 py-4 font-semibold text-ink-700">
                            Actions
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-ink-100">

                    @forelse ($products as $product)

                        <tr class="hover:bg-ink-50">

                            <!-- Product -->
                            <td class="px-6 py-4">

                                <div class="font-medium text-ink-900">
                                    {{ $product->name }}
                                </div>

                                @if ($product->description)
                                    <div class="mt-1 text-xs text-ink-500">
                                        {{ $product->description }}
                                    </div>
                                @endif

                            </td>

                            <!-- SKU -->
                            <td class="px-6 py-4 text-ink-600">
                                {{ $product->sku }}
                            </td>

                            <!-- Category -->
                            <td class="px-6 py-4 text-ink-600">
                                {{ $product->category ?? '—' }}
                            </td>

                            <!-- Selling Price -->
                            <td class="px-6 py-4 font-medium text-ink-900">
                                KES {{ number_format($product->selling_price, 2) }}
                            </td>

                            <!-- Stock -->
                            <td class="px-6 py-4">

                                <span class="font-medium {{ $product->stock_quantity <= $product->minimum_stock ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $product->stock_quantity }}
                                </span>

                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">

                                @if ($product->is_active)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">

                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="inline-flex items-center rounded-lg border border-ink-200 px-3 py-2 text-sm font-medium text-ink-700 hover:bg-ink-50">
                                    Edit
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="px-6 py-12 text-center">

                                <div class="text-4xl">
                                    📦
                                </div>

                                <h3 class="mt-3 font-semibold text-ink-900">
                                    No products yet
                                </h3>

                                <p class="mt-1 text-sm text-ink-500">
                                    Start by adding your first product.
                                </p>

                                <a href="{{ route('admin.products.create') }}"
                                   class="mt-4 inline-block btn-primary">
                                    Add Your First Product
                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if ($products->hasPages())

            <div class="border-t border-ink-100 px-6 py-4">
                {{ $products->links() }}
            </div>

        @endif

    </div>

</x-layouts.app>