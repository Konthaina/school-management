<x-app-layout>
    <x-container class="py-8">
        <!-- Header with Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <x-button type="secondary" size="sm" onclick="window.location.href='{{ route('documents.index') }}'">
                <i class="fas fa-arrow-left mr-2"></i>Back to Documents
            </x-button>
        </div>

        <!-- Page Title -->
        <x-page-header title="Document Details" description="{{ $document->name }}">
        </x-page-header>

        <!-- Document Details Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Main Info Card -->
            <x-card class="lg:col-span-2">
                <div class="space-y-6">
                    <!-- Document Header -->
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 rounded-lg bg-primary-100 dark:bg-primary-900 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-file-pdf text-2xl text-primary-600 dark:text-primary-400"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $document->name }}</h3>
                            <p class="text-slate-600 dark:text-slate-400 mt-1">Document ID: <span class="font-mono">#{{ $document->id }}</span></p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-slate-200 dark:border-slate-700"></div>

                    <!-- Document Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Publication Year -->
                        <div>
                            <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Publication Year</label>
                            <p class="mt-2 text-lg text-slate-900 dark:text-white">{{ $document->publication_year ?? 'N/A' }}</p>
                        </div>

                        <!-- Author -->
                        <div>
                            <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Author</label>
                            <p class="mt-2 text-lg text-slate-900 dark:text-white">{{ $document->author ?? 'N/A' }}</p>
                        </div>

                        <!-- Field -->
                        <div>
                            <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Field</label>
                            <p class="mt-2">
                                <x-badge type="primary">{{ $document->field ?? 'Unspecified' }}</x-badge>
                            </p>
                        </div>

                        <!-- Genre -->
                        <div>
                            <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Genre</label>
                            <p class="mt-2 text-lg text-slate-900 dark:text-white">{{ $document->genre ?? 'N/A' }}</p>
                        </div>

                        <!-- Keywords -->
                        <div class="md:col-span-2">
                            <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Keywords</label>
                            <p class="mt-2 text-slate-900 dark:text-white">{{ $document->keywords ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-slate-200 dark:border-slate-700"></div>

                    <!-- Download & Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-4">
                        @if($document->file_path)
                            <a href="{{ asset('storage/' . $document->file_path) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg bg-success-600 hover:bg-success-700 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-success-500" download>
                                <i class="fas fa-download mr-2"></i>Download File
                            </a>
                        @endif
                        
                        <x-button type="primary" onclick="window.location.href='{{ route('documents.edit', $document->id) }}'">
                            <i class="fas fa-edit mr-2"></i>Edit Document
                        </x-button>
                        
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="flex-1 sm:flex-none">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 text-sm font-medium rounded-lg bg-danger-600 hover:bg-danger-700 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-danger-500" onclick="return confirm('Are you sure you want to delete this document?')">
                                <i class="fas fa-trash mr-2"></i>Delete Document
                            </button>
                        </form>
                    </div>
                </div>
            </x-card>

            <!-- Sidebar Card -->
            <x-card>
                <div class="space-y-6">
                    <!-- Uploaded By -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide block mb-3">Uploaded By</label>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-700/50 rounded-lg">
                            @if($document->user->profile && $document->user->profile->profile_picture)
                                <img src="{{ asset('storage/' . $document->user->profile->profile_picture) }}" alt="Profile" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user text-primary-600 dark:text-primary-400"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-semibold text-slate-900 dark:text-white text-sm">{{ $document->user->name }}</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">{{ $document->user->email }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="border-t border-slate-200 dark:border-slate-700"></div>

                    <!-- Created Date -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Created Date</label>
                        <p class="mt-2 text-slate-900 dark:text-white">
                            <i class="fas fa-calendar text-slate-400 mr-2"></i>{{ $document->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- Last Updated -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Last Updated</label>
                        <p class="mt-2 text-slate-900 dark:text-white">
                            <i class="fas fa-clock text-slate-400 mr-2"></i>{{ $document->updated_at->format('M d, Y H:i') }}
                        </p>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Comments Section -->
        @if($document->comments->count() > 0)
            <x-card title="Comments & Ratings" class="mb-6">
                <div class="space-y-4">
                    @foreach($document->comments as $comment)
                        <div class="flex gap-4 pb-4 border-b border-slate-200 dark:border-slate-700 last:border-b-0">
                            @if($comment->user->profile && $comment->user->profile->profile_picture)
                                <img src="{{ asset('storage/' . $comment->user->profile->profile_picture) }}" alt="Profile" class="w-10 h-10 rounded-full object-cover flex-shrink-0">
                            @else
                                <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user text-primary-600 text-sm"></i>
                                </div>
                            @endif
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <p class="font-semibold text-slate-900 dark:text-white">{{ $comment->user->name }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                <p class="mt-1 text-slate-600 dark:text-slate-400">{{ $comment->content }}</p>
                                @if($comment->rating)
                                    <div class="mt-2 flex gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <span class="text-lg {{ $i <= $comment->rating ? 'text-yellow-400' : 'text-slate-300' }}">★</span>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-card>
        @endif

        <!-- Back Button -->
        <x-button type="secondary" onclick="window.location.href='{{ route('documents.index') }}'">
            <i class="fas fa-chevron-left mr-2"></i>Back to List
        </x-button>
    </x-container>
</x-app-layout>
