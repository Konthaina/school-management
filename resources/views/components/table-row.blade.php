@props(['class' => 'hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors'])

<tr class="border-0 {{ $class }}">
    {{ $slot }}
</tr>
