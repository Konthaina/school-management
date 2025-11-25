<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header -->
        <x-page-header title="Edit Document" description="{{ $document->name }}">
        </x-page-header>

        <!-- Form Card -->
        <x-card class="max-w-2xl">
            <form method="POST" action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Document Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-file-alt mr-2 text-primary-600"></i>Document Name
                        </label>
                        <x-input 
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $document->name) }}"
                            placeholder="Enter document name"
                            required
                        />
                        @error('name')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Publication Year Field -->
                    <div>
                        <label for="publication_year" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-calendar mr-2 text-primary-600"></i>Publication Year
                        </label>
                        <x-input 
                            id="publication_year"
                            name="publication_year"
                            type="number"
                            value="{{ old('publication_year', $document->publication_year) }}"
                            placeholder="2024"
                            required
                        />
                        @error('publication_year')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Author Field -->
                    <div>
                        <label for="author" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-user mr-2 text-primary-600"></i>Author
                        </label>
                        <x-input 
                            id="author"
                            name="author"
                            type="text"
                            value="{{ old('author', $document->author) }}"
                            placeholder="Author name"
                        />
                        @error('author')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Field Field -->
                    <div>
                        <label for="field" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-tag mr-2 text-primary-600"></i>Field
                        </label>
                        <x-input 
                            id="field"
                            name="field"
                            type="text"
                            value="{{ old('field', $document->field) }}"
                            placeholder="e.g., Science, Technology, Mathematics"
                        />
                        @error('field')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Genre Field -->
                    <div>
                        <label for="genre" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-book mr-2 text-primary-600"></i>Genre
                        </label>
                        <x-input 
                            id="genre"
                            name="genre"
                            type="text"
                            value="{{ old('genre', $document->genre) }}"
                            placeholder="e.g., Research Paper, Article, Book"
                        />
                        @error('genre')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Keywords Field -->
                    <div>
                        <label for="keywords" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-key mr-2 text-primary-600"></i>Keywords
                        </label>
                        <textarea 
                            id="keywords"
                            name="keywords"
                            placeholder="Comma-separated keywords (optional)"
                            rows="3"
                            class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-700 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary-500"
                        >{{ old('keywords', $document->keywords) }}</textarea>
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                            <i class="fas fa-info-circle mr-1"></i>Separate multiple keywords with commas
                        </p>
                        @error('keywords')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- User Field -->
                    <div>
                        <label for="user_id" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-user-circle mr-2 text-primary-600"></i>Document Owner
                        </label>
                        <x-select 
                            id="user_id"
                            name="user_id"
                            required
                        >
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $document->user_id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </x-select>
                        @error('user_id')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- File Upload Field -->
                    <div>
                        <label for="file" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-upload mr-2 text-primary-600"></i>Replace File (Optional)
                        </label>
                        <div class="relative">
                            <input 
                                id="file"
                                name="file"
                                type="file"
                                class="block w-full text-sm text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary-600 file:text-white hover:file:bg-primary-700 cursor-pointer"
                            />
                        </div>
                        @if($document->file_path)
                            <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                                <i class="fas fa-check-circle mr-1 text-success-600"></i>Current file: <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-primary-600 hover:underline">View</a>
                            </p>
                        @endif
                        <p class="mt-1 text-xs text-slate-500 dark:text-slate-400">
                            <i class="fas fa-info-circle mr-1"></i>Leave empty to keep the current file. Max 50MB
                        </p>
                        @error('file')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <x-button type="primary">
                            <i class="fas fa-save mr-2"></i>Update Document
                        </x-button>
                        <x-button type="secondary" onclick="window.history.back()">
                            <i class="fas fa-times mr-2"></i>Cancel
                        </x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>
