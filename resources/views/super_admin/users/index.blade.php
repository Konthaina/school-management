<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header with Action Button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <x-page-header title="User Management" description="Manage all system users and roles">
            </x-page-header>
            <x-button type="primary" onclick="window.location.href='{{ route('users.create') }}'">
                <i class="fas fa-plus mr-2"></i>Add New User
            </x-button>
        </div>

        <!-- Data Table -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            @if($users->count() > 0)
                <x-table :headers="['Name', 'Email', 'Role', 'Member Since', 'Actions']">
                    @foreach($users as $user)
                        <x-table-row>
                            <x-table-cell>
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-user text-primary-600 dark:text-primary-400"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-900 dark:text-white">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </x-table-cell>
                            <x-table-cell>
                                <p class="text-slate-600 dark:text-slate-400">{{ $user->email }}</p>
                            </x-table-cell>
                            <x-table-cell>
                                <x-badge type="primary">
                                    <i class="fas fa-user-tag mr-1"></i>{{ $user->role->name ?? 'N/A' }}
                                </x-badge>
                            </x-table-cell>
                            <x-table-cell>
                                <p class="text-slate-600 dark:text-slate-400 text-sm">
                                    <i class="fas fa-calendar text-slate-400 mr-2"></i>{{ $user->created_at->format('M d, Y') }}
                                </p>
                            </x-table-cell>
                            <x-table-cell>
                                <div class="flex gap-2">
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('users.show', $user->id) }}'">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </x-button>
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('users.edit', $user->id) }}'">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </x-button>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center text-xs font-medium rounded-lg px-3 py-1.5 bg-danger-600 hover:bg-danger-700 text-white transition-colors" onclick="return confirm('Confirm delete this user?')">
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
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 font-medium">No users found</p>
                    <p class="text-slate-500 dark:text-slate-500 text-sm mt-2">Start by adding your first user.</p>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
