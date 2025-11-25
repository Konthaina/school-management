@props(['type' => 'text', 'placeholder' => '', 'class' => ''])

<input 
    type="{{ $type }}" 
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'w-full px-4 py-2 text-sm border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 ' . $class]) }}
/>
