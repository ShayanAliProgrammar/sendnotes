@props(['on'])

<div x-data="{ shown: false, timeout: null }" x-init="@this.on('{{ $on }}', () => {
    clearTimeout(timeout);
    shown = true;
    timeout = setTimeout(() => { shown = false }, 2000);
})" x-show.transition.out.opacity.duration.400ms="shown"
    x-transition:leave.opacity.duration.400ms style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-secondary-600 dark:text-secondary-400']) }}>
    {{ $slot->isEmpty() ? 'Saved.' : $slot }}
</div>
