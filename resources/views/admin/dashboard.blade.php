<x-layouts.app title="Dashboard">

    {{-- Welcome Banner --}}
    <div class="mb-8 overflow-hidden rounded-2xl bg-gradient-to-r from-brand-600 via-brand-500 to-indigo-500 p-6 text-white shadow-lg">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

            <div>
                <p class="text-sm font-medium text-white/80">
                    Welcome back, Administrator
                </p>

                <h1 class="mt-2 text-3xl font-bold">
                    Hello, {{ auth()->user()->name }} 👋
                </h1>

                <p class="mt-2 max-w-xl text-sm text-white/80">
                    Welcome to your Point of Sale dashboard. Manage products,
                    users and your business operations from one place.
                </p>

                <div class="mt-5 flex flex-wrap gap-3">

                    <a href="{{ route('admin.products.create') }}"
                       class="rounded-lg bg-white px-5 py-3 text-sm font-semibold text-brand-600 shadow-sm transition hover:-translate-y-0.5 hover:bg-white/90">
                        + Add Product
                    </a>

                    <a href="{{ route('admin.users.create') }}"
                       class="rounded-lg bg-white/15 px-5 py-3 text-sm font-semibold text-white ring-1 ring-white/30 transition hover:bg-white/25">
                        + Add User
                    </a>

                </div>
            </div>

            <div class="hidden rounded-2xl bg-white/10 p-5 backdrop-blur-sm md:block">
                <div class="text-4xl">
                    🏪
                </div>

                <p class="mt-3 text-xs text-white/70">
                    Account
                </p>

                <p class="mt-1 font-semibold">
                    Administrator
                </p>

                <div class="mt-3 flex items-center gap-2 text-xs text-white/80">
                    <span class="h-2 w-2 rounded-full bg-green-300"></span>
                    System Online
                </div>
            </div>

        </div>
    </div>


    {{-- Dashboard Statistics --}}
    <div class="mb-8">

        <div class="mb-4 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-ink-900">
                    Today's Overview
                </h2>

                <p class="text-sm text-ink-500">
                    A quick look at your POS activity.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Sales --}}
            <div class="rounded-2xl border border-blue-100 bg-gradient-to-br from-blue-50 to-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-2xl">
                        💰
                    </div>

                    <span class="text-xs font-semibold text-blue-600">
                        TODAY
                    </span>
                </div>

                <p class="mt-5 text-sm font-medium text-ink-500">
                    Today's Sales
                </p>

                <p class="mt-1 text-2xl font-bold text-ink-900">
                    KES 0
                </p>

                <p class="mt-1 text-xs text-ink-400">
                    0 transactions
                </p>
            </div>


            {{-- Profit --}}
            <div class="rounded-2xl border border-green-100 bg-gradient-to-br from-green-50 to-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-2xl">
                        📈
                    </div>

                    <span class="text-xs font-semibold text-green-600">
                        PROFIT
                    </span>
                </div>

                <p class="mt-5 text-sm font-medium text-ink-500">
                    Gross Profit
                </p>

                <p class="mt-1 text-2xl font-bold text-ink-900">
                    KES 0
                </p>

                <p class="mt-1 text-xs text-ink-400">
                    Today's profit
                </p>
            </div>


            {{-- Payments --}}
            <div class="rounded-2xl border border-purple-100 bg-gradient-to-br from-purple-50 to-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl">
                        💳
                    </div>

                    <span class="text-xs font-semibold text-purple-600">
                        PAYMENTS
                    </span>
                </div>

                <p class="mt-5 text-sm font-medium text-ink-500">
                    Cash / M-Pesa
                </p>

                <p class="mt-1 text-2xl font-bold text-ink-900">
                    0 / 0
                </p>

                <p class="mt-1 text-xs text-ink-400">
                    Payment activity
                </p>
            </div>


            {{-- Stock --}}
            <div class="rounded-2xl border border-orange-100 bg-gradient-to-br from-orange-50 to-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-2xl">
                        📦
                    </div>

                    <span class="text-xs font-semibold text-orange-600">
                        INVENTORY
                    </span>
                </div>

                <p class="mt-5 text-sm font-medium text-ink-500">
                    Low Stock Items
                </p>

                <p class="mt-1 text-2xl font-bold text-ink-900">
                    0
                </p>

                <p class="mt-1 text-xs text-ink-400">
                    Products need attention
                </p>
            </div>

        </div>
    </div>


    {{-- Quick Actions --}}
    <div class="mb-8">

        <div class="mb-4">
            <h2 class="text-lg font-bold text-ink-900">
                Quick Actions
            </h2>

            <p class="text-sm text-ink-500">
                Quickly access the most important parts of your system.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">

            {{-- Products --}}
            <a href="{{ route('admin.products.index') }}"
               class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-2xl transition group-hover:scale-110">
                    📦
                </div>

                <h3 class="mt-4 font-bold text-ink-900">
                    Products
                </h3>

                <p class="mt-1 text-sm text-ink-500">
                    Manage products and inventory.
                </p>

                <div class="mt-4 text-sm font-semibold text-blue-600">
                    Open Products →
                </div>

            </a>


            {{-- Add Product --}}
            <a href="{{ route('admin.products.create') }}"
               class="group rounded-2xl border border-green-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-green-200 hover:shadow-lg">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-2xl transition group-hover:scale-110">
                    ➕
                </div>

                <h3 class="mt-4 font-bold text-ink-900">
                    Add Product
                </h3>

                <p class="mt-1 text-sm text-ink-500">
                    Add a new product to your stock.
                </p>

                <div class="mt-4 text-sm font-semibold text-green-600">
                    Add Product →
                </div>

            </a>


            {{-- Users --}}
            <a href="{{ route('admin.users.index') }}"
               class="group rounded-2xl border border-purple-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-purple-200 hover:shadow-lg">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl transition group-hover:scale-110">
                    👥
                </div>

                <h3 class="mt-4 font-bold text-ink-900">
                    Users
                </h3>

                <p class="mt-1 text-sm text-ink-500">
                    Manage system users and accounts.
                </p>

                <div class="mt-4 text-sm font-semibold text-purple-600">
                    Manage Users →
                </div>

            </a>


            {{-- Profile --}}
            <a href="{{ route('profile.edit') }}"
               class="group rounded-2xl border border-orange-100 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-orange-200 hover:shadow-lg">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-orange-100 text-2xl transition group-hover:scale-110">
                    ⚙️
                </div>

                <h3 class="mt-4 font-bold text-ink-900">
                    My Profile
                </h3>

                <p class="mt-1 text-sm text-ink-500">
                    Update your account information.
                </p>

                <div class="mt-4 text-sm font-semibold text-orange-600">
                    Open Profile →
                </div>

            </a>

        </div>
    </div>


    {{-- System Status --}}
    <div class="rounded-2xl border border-ink-100 bg-white p-6 shadow-sm">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-xl">
                    ✓
                </div>

                <div>
                    <h2 class="font-bold text-ink-900">
                        System Status
                    </h2>

                    <p class="mt-1 text-sm text-ink-500">
                        Your Point of Sale system is running normally.
                    </p>
                </div>

            </div>

            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-xs font-bold text-green-700">
                <span class="h-2 w-2 rounded-full bg-green-500"></span>
                SYSTEM ONLINE
            </span>

        </div>

    </div>

</x-layouts.app>