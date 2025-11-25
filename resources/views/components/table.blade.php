@props(['headers' => [], 'class' => ''])

<div class="overflow-x-auto rounded-lg border border-slate-200 dark:border-slate-700">
    <table class="w-full border-collapse {{ $class }}">
        @if(count($headers) > 0)
            <thead>
                <tr class="bg-slate-50 dark:bg-slate-700 border-b border-slate-200 dark:border-slate-600">
                    @foreach($headers as $header)
                        <th class="px-6 py-4 text-left text-sm font-semibold text-slate-900 dark:text-white">
                            {{ $header }}
                        </th>
                    @endforeach
                </tr>
            </thead>
        @endif
        <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
            {{ $slot }}
        </tbody>
    </table>
</div>
