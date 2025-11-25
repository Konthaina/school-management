<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <x-page-header title="Users Management" description="Manage all system users">
            </x-page-header>
            <x-button type="primary" onclick="window.location.href='{{ route('admin.users.create') }}'">
                <i class="fas fa-plus mr-2"></i>Create User
            </x-button>
        </div>

        <!-- Users Table -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            @if($users->count() > 0)
                <x-table :headers="['ID', 'Name', 'Email', 'Role', 'Actions']">
                    @foreach($users as $user)
                        <x-table-row>
                            <x-table-cell class="font-mono text-sm">{{ $user->id }}</x-table-cell>
                            <x-table-cell>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                        <i class="fas fa-user text-primary-600 text-sm"></i>
                                    </div>
                                    <span class="font-medium">{{ $user->name }}</span>
                                </div>
                            </x-table-cell>
                            <x-table-cell>{{ $user->email }}</x-table-cell>
                            <x-table-cell>
                                <x-badge type="primary">{{ $user->role->name }}</x-badge>
                            </x-table-cell>
                            <x-table-cell>
                                <div class="flex gap-2">
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('admin.users.show', $user->id) }}'">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </x-button>
                                    @if(auth()->user()->role->name === 'Super Admin' || $user->role->name !== 'Super Admin')
                                        <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('admin.users.edit', $user->id) }}'">
                                            <i class="fas fa-edit mr-1"></i>Edit
                                        </x-button>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center text-xs font-medium rounded-lg px-3 py-1.5 bg-danger-600 hover:bg-danger-700 text-white transition-colors" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </x-table-cell>
                        </x-table-row>
                    @endforeach
                </x-table>
            @else
                <div class="p-12 text-center">
                    <div class="text-slate-400 dark:text-slate-500 mb-4">
                        <i class="fas fa-users text-4xl"></i>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 font-medium">No users found</p>
                    <p class="text-slate-500 dark:text-slate-500 text-sm mt-1">Create your first user to get started</p>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
