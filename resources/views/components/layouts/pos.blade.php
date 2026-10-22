{{-- POS shell: minimal top bar, no sidebar clutter — cashiers need screen space. --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'POS' }} · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-ink-50">
    <header class="flex h-14 items-center justify-between border-b border-ink-100 bg-white px-4 md:px-6">
        <div class="flex items-center gap-2">
            <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-brand-500 text-xs font-bold text-white">
                {{ substr(config('app.name'), 0, 1) }}
            </div>
            <span class="text-sm font-semibold text-ink-900">{{ config('app.name') }}</span>
        </div>
        <nav class="flex items-center gap-4 text-sm">
            <a href="{{ route('pos.dashboard') }}"
               class="{{ request()->routeIs('pos.dashboard') ? 'font-medium text-brand-700' : 'text-ink-500 hover:text-ink-900' }}">
                My dashboard
            </a>
            {{-- POS screen link lands in Phase 4. --}}
            <span class="text-ink-300">|</span>
            <span class="text-ink-500">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-ink-500 hover:text-danger-500">Log out</button>
            </form>
        </nav>
    </header>
    <main class="p-4 md:p-6">
        {{ $slot }}
    </main>
</body>
</html>
