<x-app-layout>
    <x-container class="py-8">
        <!-- Header with Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <x-button type="secondary" size="sm" onclick="window.location.href='{{ route('admin.users.index') }}'">
                <i class="fas fa-arrow-left mr-2"></i>Back to Users
            </x-button>
        </div>

        <!-- Page Title -->
        <x-page-header title="User Details" description="{{ $user->name }}">
        </x-page-header>

        <!-- User Details Card -->
        <x-card class="max-w-2xl">
            <div class="space-y-6">
                <!-- Profile Avatar and Name -->
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-2xl text-primary-600"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $user->name }}</h3>
                        <p class="text-slate-600 dark:text-slate-400 mt-1">User ID: <span class="font-mono">#{{ $user->id }}</span></p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-slate-200 dark:border-slate-700"></div>

                <!-- User Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Email Address</label>
                        <p class="mt-2 text-lg text-slate-900 dark:text-white break-all">{{ $user->email }}</p>
                    </div>

                    <!-- Role -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">User Role</label>
                        <p class="mt-2">
                            <x-badge type="primary">
                                <i class="fas fa-user-tag mr-1"></i>{{ $user->role->name }}
                            </x-badge>
                        </p>
                    </div>

                    <!-- Created At -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Member Since</label>
                        <p class="mt-2 text-lg text-slate-900 dark:text-white">
                            <i class="fas fa-calendar text-slate-400 mr-2"></i>{{ $user->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- Last Updated -->
                    <div>
                        <label class="text-sm font-semibold text-slate-600 dark:text-slate-400 uppercase tracking-wide">Last Updated</label>
                        <p class="mt-2 text-lg text-slate-900 dark:text-white">
                            <i class="fas fa-clock text-slate-400 mr-2"></i>{{ $user->updated_at->format('M d, Y \a\t H:i') }}
                        </p>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-slate-200 dark:border-slate-700"></div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    @if(auth()->user()->role->name === 'Super Admin' || $user->role->name !== 'Super Admin')
                        <x-button type="primary" onclick="window.location.href='{{ route('admin.users.edit', $user->id) }}'">
                            <i class="fas fa-edit mr-2"></i>Edit User
                        </x-button>
                        
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="flex-1 sm:flex-none">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 text-sm font-medium rounded-lg bg-danger-600 hover:bg-danger-700 text-white transition-colors focus:outline-none focus:ring-2 focus:ring-danger-500" onclick="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                                <i class="fas fa-trash mr-2"></i>Delete User
                            </button>
                        </form>
                    @endif

                    <x-button type="secondary" onclick="window.location.href='{{ route('admin.users.index') }}'">
                        <i class="fas fa-chevron-left mr-2"></i>Back to List
                    </x-button>
                </div>
            </div>
        </x-card>
    </x-container>
</x-app-layout>
