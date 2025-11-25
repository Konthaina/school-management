@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'flex items-start gap-2 mt-2 text-sm text-danger-600 dark:text-danger-400']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-start">
                <i class="fas fa-exclamation-circle mr-2 mt-0.5 flex-shrink-0"></i>
                <span>{{ $message }}</span>
            </li>
        @endforeach
    </ul>
@endif
