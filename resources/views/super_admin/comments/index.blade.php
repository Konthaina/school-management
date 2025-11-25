<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header with Action Button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <x-page-header title="Comments Management" description="Manage document comments and ratings">
            </x-page-header>
            <x-button type="primary" onclick="window.location.href='{{ route('comments.create') }}'">
                <i class="fas fa-plus mr-2"></i>Add Comment
            </x-button>
        </div>

        <!-- Data Table -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            @if($comments->count() > 0)
                <x-table :headers="['Document', 'User', 'Rating', 'Content', 'Actions']">
                    @foreach($comments as $comment)
                        <x-table-row>
                            <x-table-cell>
                                <p class="font-semibold text-slate-900 dark:text-white">{{ $comment->document->name }}</p>
                            </x-table-cell>
                            <x-table-cell>
                                <p class="text-slate-600 dark:text-slate-400">{{ $comment->user->name }}</p>
                            </x-table-cell>
                            <x-table-cell>
                                <div class="flex gap-1">
                                    @if($comment->rating)
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="text-lg {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-slate-300' }}">★</span>
                                        @endfor
                                    @else
                                        <p class="text-slate-500 text-sm">No rating</p>
                                    @endif
                                </div>
                            </x-table-cell>
                            <x-table-cell>
                                <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-2">{{ Str::limit($comment->content, 50) }}</p>
                            </x-table-cell>
                            <x-table-cell>
                                <div class="flex gap-2">
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('comments.show', $comment->id) }}'">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </x-button>
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('comments.edit', $comment->id) }}'">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </x-button>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center text-xs font-medium rounded-lg px-3 py-1.5 bg-danger-600 hover:bg-danger-700 text-white transition-colors" onclick="return confirm('Confirm delete?')">
                                            <i class="fas fa-trash mr-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </x-table-cell>
                        </x-table-row>
                    @endforeach
                </x-table>
            @else
                <div class="p-12 text-center">
                    <div class="text-slate-400 dark:text-slate-500 mb-4">
                        <i class="fas fa-comments text-4xl"></i>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 font-medium">No comments found</p>
                    <p class="text-slate-500 dark:text-slate-500 text-sm mt-2">Start by adding your first comment.</p>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
