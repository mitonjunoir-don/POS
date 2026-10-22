{{-- Admin shell: sidebar nav + top bar. Used by every admin.* page. --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ink-50">
    <div class="flex min-h-screen">
        <aside class="hidden w-64 shrink-0 border-r border-ink-100 bg-white md:flex md:flex-col">
            <div class="flex h-16 items-center gap-2 border-b border-ink-100 px-6">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-500 text-sm font-bold text-white">
                    {{ substr(config('app.name'), 0, 1) }}
                </div>
                <span class="font-semibold text-ink-900">{{ config('app.name') }}</span>
            </div>
            <nav class="flex-1 space-y-1 px-3 py-4 text-sm">
                <nav class="flex-1 space-y-1 px-3 py-4 text-sm">

    {{-- Dashboard --}}
    <a href="{{ route('admin.dashboard') }}"
       class="flex items-center gap-3 rounded-lg px-3 py-2 font-medium
              {{ request()->routeIs('admin.dashboard') ? 'bg-brand-50 text-brand-700' : 'text-ink-700 hover:bg-ink-50' }}">
        <span>🏠</span>
        <span>Dashboard</span>
    </a>

    {{-- Users --}}
    <a href="{{ route('admin.users.index') }}"
       class="flex items-center gap-3 rounded-lg px-3 py-2 font-medium
              {{ request()->routeIs('admin.users.*') ? 'bg-brand-50 text-brand-700' : 'text-ink-700 hover:bg-ink-50' }}">
        <span>👥</span>
        <span>Users</span>
    </a>

    {{-- Profile --}}
    <a href="{{ route('profile.edit') }}"
       class="flex items-center gap-3 rounded-lg px-3 py-2 font-medium
              {{ request()->routeIs('profile.*') ? 'bg-brand-50 text-brand-700' : 'text-ink-700 hover:bg-ink-50' }}">
        <span>👤</span>
        <span>My Profile</span>
    </a>

</nav>
                
            
                    
                
                
                
                   
                        
            
                </a>
            </nav>
            <div class="border-t border-ink-100 p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary w-full">Log out</button>
                </form>
            </div>
        </aside>

        <div class="flex flex-1 flex-col">
            <header class="flex h-16 items-center justify-between border-b border-ink-100 bg-white px-6">
                <h1 class="text-lg font-semibold text-ink-900">{{ $title ?? 'Dashboard' }}</h1>
                <div class="text-sm text-ink-500">{{ auth()->user()->name }} &middot; Admin</div>
            </header>
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

