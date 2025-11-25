<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header -->
        <x-page-header title="Edit User" description="{{ $user->name }}">
        </x-page-header>

        <!-- Form Card -->
        <x-card class="max-w-2xl">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-user mr-2 text-primary-600"></i>Full Name
                        </label>
                        <x-input 
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name', $user->name) }}"
                            placeholder="Enter user's full name"
                            required
                        />
                        @error('name')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-envelope mr-2 text-primary-600"></i>Email Address
                        </label>
                        <x-input 
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email', $user->email) }}"
                            placeholder="user@example.com"
                            required
                        />
                        @error('email')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-lock mr-2 text-primary-600"></i>Password
                        </label>
                        <x-input 
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Leave blank to keep current password"
                        />
                        <p class="mt-2 text-xs text-slate-500 dark:text-slate-400">
                            <i class="fas fa-info-circle mr-1"></i>Leave empty to keep the current password
                        </p>
                        @error('password')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Role Field -->
                    <div>
                        <label for="role_id" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
                            <i class="fas fa-user-tag mr-2 text-primary-600"></i>User Role
                        </label>
                        <x-select 
                            id="role_id"
                            name="role_id"
                            required
                        >
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </x-select>
                        @error('role_id')
                            <p class="mt-2 text-sm text-danger-600 dark:text-danger-400 flex items-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4 pt-4 border-t border-slate-200 dark:border-slate-700">
                        <x-button type="primary">
                            <i class="fas fa-save mr-2"></i>Update User
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
