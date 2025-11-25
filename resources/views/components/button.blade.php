@props(['type' => 'primary', 'size' => 'md', 'class' => '', 'disabled' => false])

@php
    $baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';
    
    $types = [
        'primary' => 'bg-primary-600 hover:bg-primary-700 text-white focus:ring-primary-500',
        'secondary' => 'bg-slate-200 hover:bg-slate-300 text-slate-900 dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-white focus:ring-slate-500',
        'success' => 'bg-success-600 hover:bg-success-700 text-white focus:ring-success-500',
        'danger' => 'bg-danger-600 hover:bg-danger-700 text-white focus:ring-danger-500',
        'warning' => 'bg-warning-600 hover:bg-warning-700 text-white focus:ring-warning-500',
        'outline' => 'border-2 border-slate-300 hover:border-slate-400 text-slate-900 dark:border-slate-600 dark:hover:border-slate-500 dark:text-white focus:ring-slate-500',
    ];
    
    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
        'xl' => 'px-8 py-3 text-base',
    ];
    
    $typeClass = $types[$type] ?? $types['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => "$baseClasses $typeClass $sizeClass $class", 'disabled' => $disabled]) }}>
    {{ $slot }}
</button>
