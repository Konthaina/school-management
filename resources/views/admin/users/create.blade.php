<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header -->
        <div class="flex items-center gap-4 mb-8">
            <x-button type="secondary" size="sm" onclick="window.location.href='{{ route('admin.users.index') }}'">
                <i class="fas fa-arrow-left mr-2"></i>Back to Users
            </x-button>
        </div>

        <x-page-header title="Create New User" description="Add a new user to the system">
        </x-page-header>

        <!-- Form Card -->
        <x-card class="max-w-2xl">
            <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <x-input-label for="name">Full Name</x-input-label>
                    <x-input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Enter user's full name"
                        value="{{ old('name') }}"
                        required
                    />
                    @error('name')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <x-input-label for="email">Email Address</x-input-label>
                    <x-input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="user@example.com"
                        value="{{ old('email') }}"
                        required
                    />
                    @error('email')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <x-input-label for="password">Password</x-input-label>
                    <x-input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Enter a secure password"
                        required
                    />
                    @error('password')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Role Field -->
                <div>
                    <x-input-label for="role_id">User Role</x-input-label>
                    <x-select 
                        id="role_id"
                        name="role_id"
                        placeholder="Select a role"
                        required
                    >
                        @foreach($roles as $role)
                            @if(auth()->user()->role->name === 'Super Admin' || $role->name !== 'Super Admin')
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endif
                        @endforeach
                    </x-select>
                    @error('role_id')
                        <x-input-error :messages="$message" class="mt-2" />
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                    <x-button type="primary" class="flex-1">
                        <i class="fas fa-save mr-2"></i>Create User
                    </x-button>
                    <x-button type="secondary" class="flex-1" onclick="window.location.href='{{ route('admin.users.index') }}'">
                        <i class="fas fa-times mr-2"></i>Cancel
                    </x-button>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>
