@props(['label', 'value', 'context' => null])
<div {{ $attributes->merge(['class' => 'card']) }}>
    <p class="text-xs font-medium uppercase tracking-wide text-ink-500">{{ $label }}</p>
    <p class="mt-2 text-2xl font-semibold text-ink-900">{{ $value }}</p>
    @if ($context)
        <p class="mt-1 text-xs text-ink-500">{{ $context }}</p>
    @endif
</div>
