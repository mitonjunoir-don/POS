<x-layouts.pos title="My dashboard">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <x-ui.stat-card label="My sales today" value="KES 0" context="0 transactions" />
        <x-ui.stat-card label="Cash" value="KES 0" />
        <x-ui.stat-card label="M-Pesa" value="KES 0" />
        <x-ui.stat-card label="Transactions" value="0" />
    </div>

    <div class="mt-6 card">
        <p class="text-sm text-ink-500">
            The POS screen and today's sales list land in Phase 4.
        </p>
    </div>
</x-layouts.pos>
