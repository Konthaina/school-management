@props(['title', 'description' => null])

<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $title }}</h1>
    @if($description)
        <p class="mt-2 text-slate-600 dark:text-slate-400">{{ $description }}</p>
    @endif
    {{ $slot }}
</div>
