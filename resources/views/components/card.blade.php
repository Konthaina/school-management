@props(['class' => '', 'icon' => null, 'title' => null, 'subtitle' => null])

<div class="bg-white dark:bg-slate-800 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200 overflow-hidden {{ $class }}">
    @if($icon)
        <div class="flex items-center justify-between p-6">
            <div>
                @if($title)
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">{{ $title }}</h3>
                @endif
                @if($subtitle)
                    <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">{{ $subtitle }}</p>
                @endif
            </div>
            <div class="text-4xl text-primary-500">
                {!! $icon !!}
            </div>
        </div>
    @else
        <div class="p-6">
            {{ $slot }}
        </div>
    @endif
</div>
