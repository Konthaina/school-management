<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header -->
        <x-page-header title="Dashboard" description="School management overview and statistics">
        </x-page-header>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Documents Card -->
            <x-card class="border-l-4 border-l-primary-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-600 dark:text-slate-400 text-sm font-medium">Total Documents</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-white mt-2">{{ $documentCount }}</p>
                        <p class="text-xs text-success-600 dark:text-success-400 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>+{{ $documentCountDelta ?? 0 }} from yesterday
                        </p>
                    </div>
                    <div class="text-5xl text-primary-100 dark:text-primary-900">
                        <i class="fas fa-file-alt text-primary-600"></i>
                    </div>
                </div>
            </x-card>

            <!-- Users Card -->
            <x-card class="border-l-4 border-l-warning-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-600 dark:text-slate-400 text-sm font-medium">Total Users</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-white mt-2">{{ $userCount }}</p>
                        <p class="text-xs text-success-600 dark:text-success-400 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>+{{ $userCountDelta ?? 0 }} from yesterday
                        </p>
                    </div>
                    <div class="text-5xl text-warning-100 dark:text-warning-900">
                        <i class="fas fa-users text-warning-600"></i>
                    </div>
                </div>
            </x-card>

            <!-- Comments Card -->
            <x-card class="border-l-4 border-l-success-600">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-600 dark:text-slate-400 text-sm font-medium">Total Comments</p>
                        <p class="text-3xl font-bold text-slate-900 dark:text-white mt-2">{{ $commentCount }}</p>
                        <p class="text-xs text-success-600 dark:text-success-400 mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>+{{ $commentCountDelta ?? 0 }} from yesterday
                        </p>
                    </div>
                    <div class="text-5xl text-success-100 dark:text-success-900">
                        <i class="fas fa-comments text-success-600"></i>
                    </div>
                </div>
            </x-card>
        </div>

        <!-- Recent Documents Section -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-slate-200 dark:border-slate-700">
                <h2 class="text-lg font-semibold text-slate-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-history text-primary-600"></i>
                    Recent Documents
                </h2>
            </div>

            <!-- Search and Filters -->
            <div class="p-6 border-b border-slate-200 dark:border-slate-700 space-y-4">
                <form action="{{ route('super_admin.dashboard') }}" method="GET" class="flex flex-1 gap-2">
                    <x-input 
                        type="text"
                        name="search" 
                        placeholder="Search documents..." 
                        value="{{ request('search') }}"
                        class="flex-1"
                    />
                    <x-button type="primary">
                        <i class="fas fa-search mr-2"></i>Search
                    </x-button>
                </form>

                <!-- Tabs and Sort -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex gap-2 flex-wrap">
                        <a href="{{ route('super_admin.dashboard', ['sort_by' => 'created_at']) }}"
                           class="px-4 py-2 rounded-lg font-medium transition-all {{ request('sort_by', 'created_at') === 'created_at' ? 'bg-primary-600 text-white shadow-md' : 'bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white hover:bg-slate-300 dark:hover:bg-slate-600' }}">
                           <i class="fas fa-clock mr-1"></i>Newest
                        </a>
                        <a href="{{ route('super_admin.dashboard', ['sort_by' => 'name']) }}"
                           class="px-4 py-2 rounded-lg font-medium transition-all {{ request('sort_by') === 'name' ? 'bg-primary-600 text-white shadow-md' : 'bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white hover:bg-slate-300 dark:hover:bg-slate-600' }}">
                           <i class="fas fa-list mr-1"></i>All
                        </a>
                    </div>

                    <form action="{{ route('super_admin.dashboard') }}" method="GET" class="w-full sm:w-auto">
                        <x-select 
                            name="sort_by" 
                            class="w-full sm:w-56"
                            onchange="this.form.submit()"
                        >
                            <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Sort by: Newest</option>
                            <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Sort by: Title</option>
                            <option value="publication_year" {{ request('sort_by') === 'publication_year' ? 'selected' : '' }}>Sort by: Year</option>
                        </x-select>
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    </form>
                </div>
            </div>

            <!-- Documents Table -->
            @forelse($recentDocuments as $document)
                @if($loop->first)
                    <x-table :headers="['Document Title', 'Type', 'Publication Year', 'User']">
                @endif
                        <x-table-row>
                            <x-table-cell>
                                <a href="{{ route('documents.show', $document->id) }}" class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium">
                                    {{ $document->name }}
                                </a>
                            </x-table-cell>
                            <x-table-cell>
                                @if($document->genre === 'book')
                                    <x-badge type="book">📚 Book</x-badge>
                                @elseif($document->genre === 'lesson')
                                    <x-badge type="lesson">📖 Lesson</x-badge>
                                @else
                                    <x-badge type="revision">✏️ Revision</x-badge>
                                @endif
                            </x-table-cell>
                            <x-table-cell>{{ $document->publication_year }}</x-table-cell>
                            <x-table-cell class="text-center">
                                @if($document->user && $document->user->profile)
                                    <div class="flex items-center justify-center">
                                        <img src="{{ asset('storage/' . $document->user->profile->profile_picture) }}"
                                             alt="{{ $document->user->name }}"
                                             class="w-8 h-8 rounded-full object-cover border border-slate-200 dark:border-slate-700"
                                             title="{{ $document->user->name }}">
                                    </div>
                                @else
                                    <div class="w-8 h-8 rounded-full bg-slate-300 dark:bg-slate-600 flex items-center justify-center mx-auto">
                                        <i class="fas fa-user text-slate-500 text-xs"></i>
                                    </div>
                                @endif
                            </x-table-cell>
                        </x-table-row>
                @if($loop->last)
                    </x-table>
                @endif
            @empty
                <div class="p-12 text-center">
                    <div class="text-slate-400 dark:text-slate-500 mb-4">
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 font-medium">No documents found</p>
                    <p class="text-slate-500 dark:text-slate-500 text-sm mt-1">Try adjusting your search or filters</p>
                </div>
            @endforelse
        </div>
    </x-container>
</x-app-layout>
