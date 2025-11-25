@props(['value', 'for' => null])

<label 
    @if($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2']) }}
>
    {{ $value ?? $slot }}
</label>
