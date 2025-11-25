@props(['type' => 'default', 'class' => ''])

@php
    $types = [
        'default' => 'bg-slate-100 text-slate-800 dark:bg-slate-700 dark:text-slate-200',
        'primary' => 'bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200',
        'success' => 'bg-success-100 text-success-800 dark:bg-success-900 dark:text-success-200',
        'warning' => 'bg-warning-100 text-warning-800 dark:bg-warning-900 dark:text-warning-200',
        'danger' => 'bg-danger-100 text-danger-800 dark:bg-danger-900 dark:text-danger-200',
        'book' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
        'lesson' => 'bg-success-100 text-success-800 dark:bg-success-900 dark:text-success-200',
        'revision' => 'bg-warning-100 text-warning-800 dark:bg-warning-900 dark:text-warning-200',
    ];
    $typeClass = $types[$type] ?? $types['default'];
@endphp

<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $typeClass }} {{ $class }}">
    {{ $slot }}
</span>
