<x-app-layout>
    <x-container class="py-8">
        <!-- Header with Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <x-button type="secondary" size="sm" onclick="window.location.href='{{ route('lecturer.documents.index') }}'">
                <i class="fas fa-arrow-left mr-2"></i>Back to Documents
            </x-button>
        </div>

        <!-- Page Title -->
        <x-page-header title="Document Details" description="{{ $document->name }}">
        </x-page-header>

        <!-- Document Details Card -->
        <x-card class="max-w-3xl">
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

                    <!-- Uploaded By -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Uploaded By</label>
                        <p class="mt-2 text-lg text-slate-900 dark:text-white">{{ $document->user->name ?? 'Unknown' }}</p>
                    </div>

                    <!-- Upload Date -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Upload Date</label>
                        <p class="mt-2 text-lg text-slate-900 dark:text-white">
                            <i class="fas fa-calendar text-slate-400 mr-2"></i>{{ $document->created_at->format('M d, Y') }}
                        </p>
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
                    
                    <x-button type="primary" onclick="window.location.href='{{ route('lecturer.documents.edit', $document->id) }}'">
                        <i class="fas fa-edit mr-2"></i>Edit Document
                    </x-button>
                    
                    <form action="{{ route('lecturer.documents.destroy', $document->id) }}" method="POST" class="flex-1 sm:flex-none">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 text-sm font-medium rounded-lg bg-danger-600 hover:bg-danger-700 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-danger-500" onclick="return confirm('Are you sure you want to delete this document? This action cannot be undone.')">
                            <i class="fas fa-trash mr-2"></i>Delete Document
                        </button>
                    </form>

                    <x-button type="secondary" onclick="window.location.href='{{ route('lecturer.documents.index') }}'">
                        <i class="fas fa-chevron-left mr-2"></i>Back to List
                    </x-button>
                </div>
            </div>
        </x-card>
    </x-container>
</x-app-layout>
