# UI Upgrade Checklist

## Completed ✅
- [x] Package.json updated to latest versions
- [x] Tailwind.config.js with modern theme and colors
- [x] Global CSS file with Tailwind layers
- [x] Layout files (app.blade.php, navigation.blade.php, sidebar.blade.php)
- [x] Reusable components (card, table, button, input, select, badge, container, page-header)
- [x] dashboard.blade.php
- [x] super_admin/dashboard.blade.php
- [x] admin/users/index.blade.php

## To Do - Index/List Pages
- [ ] lecturer/users/index.blade.php
- [ ] super_admin/users/index.blade.php (if different from admin)
- [ ] lecturer/documents/index.blade.php
- [ ] super_admin/documents/index.blade.php
- [ ] super_admin/profiles/index.blade.php
- [ ] super_admin/comments/index.blade.php
- [ ] admin/profiles/index.blade.php

## To Do - Show/Detail Pages
- [ ] lecturer/users/show.blade.php
- [ ] admin/users/show.blade.php
- [ ] super_admin/users/show.blade.php
- [ ] lecturer/documents/show.blade.php
- [ ] super_admin/documents/show.blade.php
- [ ] super_admin/profiles/show.blade.php
- [ ] super_admin/comments/show.blade.php

## To Do - Create/Edit Pages
- [ ] lecturer/users/create.blade.php
- [ ] lecturer/users/edit.blade.php
- [ ] admin/users/create.blade.php
- [ ] admin/users/edit.blade.php
- [ ] super_admin/users/create.blade.php
- [ ] super_admin/users/edit.blade.php
- [ ] lecturer/documents/create.blade.php
- [ ] lecturer/documents/edit.blade.php
- [ ] super_admin/documents/create.blade.php
- [ ] super_admin/documents/edit.blade.php
- [ ] super_admin/profiles/create.blade.php
- [ ] super_admin/profiles/edit.blade.php
- [ ] super_admin/comments/create.blade.php
- [ ] super_admin/settings/edit.blade.php

## To Do - Auth Pages
- [ ] auth/login.blade.php
- [ ] auth/register.blade.php
- [ ] auth/forgot-password.blade.php
- [ ] auth/reset-password.blade.php
- [ ] auth/confirm-password.blade.php

## To Do - Other Pages
- [ ] welcome.blade.php
- [ ] home.blade.php
- [ ] profile/edit.blade.php
- [ ] profile/show.blade.php
- [ ] outsider/dashboard.blade.php

## Quick Start Guide for Updating Pages

### 1. Copy this template for index pages:
```blade
<x-app-layout>
    <x-container class="py-8">
        <!-- Page Header with Action Button -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <x-page-header title="[Page Title]" description="[Description]">
            </x-page-header>
            <x-button type="primary" onclick="window.location.href='{{ route('[create.route]') }}'">
                <i class="fas fa-plus mr-2"></i>Create
            </x-button>
        </div>

        <!-- Data Table -->
        <div class="bg-white dark:bg-slate-800 rounded-lg shadow-md overflow-hidden">
            @if($items->count() > 0)
                <x-table :headers="['Column 1', 'Column 2', 'Actions']">
                    @foreach($items as $item)
                        <x-table-row>
                            <x-table-cell>{{ $item->name }}</x-table-cell>
                            <x-table-cell>{{ $item->value }}</x-table-cell>
                            <x-table-cell>
                                <div class="flex gap-2">
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('[show.route]', $item->id) }}'">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </x-button>
                                    <x-button type="secondary" size="xs" onclick="window.location.href='{{ route('[edit.route]', $item->id) }}'">
                                        <i class="fas fa-edit mr-1"></i>Edit
                                    </x-button>
                                    <form action="{{ route('[delete.route]', $item->id) }}" method="POST" style="display: inline;">
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
                        <i class="fas fa-inbox text-4xl"></i>
                    </div>
                    <p class="text-slate-600 dark:text-slate-400 font-medium">No items found</p>
                </div>
            @endif
        </div>
    </x-container>
</x-app-layout>
```

### 2. For show/detail pages:
```blade
<x-app-layout>
    <x-container class="py-8">
        <div class="flex items-center gap-4 mb-8">
            <x-button type="secondary" size="sm" onclick="window.history.back()">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </x-button>
            <x-page-header title="{{ $item->name }}">
            </x-page-header>
        </div>

        <x-card>
            <!-- Details content -->
        </x-card>
    </x-container>
</x-app-layout>
```

### 3. For create/edit forms:
```blade
<x-app-layout>
    <x-container class="py-8">
        <x-page-header title="[Create/Edit] [Item]">
        </x-page-header>

        <x-card>
            <form action="{{ route('[store/update.route]', $item->id ?? '') }}" method="POST">
                @csrf
                @if(isset($item))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    <div>
                        <x-input-label for="name">Name</x-input-label>
                        <x-input 
                            id="name"
                            name="name"
                            value="{{ old('name', $item->name ?? '') }}"
                            required
                        />
                        @error('name')
                            <x-input-error :messages="$message" />
                        @enderror
                    </div>

                    <div class="flex gap-4 pt-4">
                        <x-button type="primary">
                            <i class="fas fa-save mr-2"></i>Save
                        </x-button>
                        <x-button type="secondary" onclick="window.history.back()">
                            Cancel
                        </x-button>
                    </div>
                </div>
            </form>
        </x-card>
    </x-container>
</x-app-layout>
```

## Color Guide

Use these badge types for status indicators:
- `type="primary"` - Default, informational
- `type="success"` - Positive actions (approved, active)
- `type="warning"` - Caution (pending, warning)
- `type="danger"` - Negative actions (deleted, error)
- `type="book"` - Document type
- `type="lesson"` - Document type
- `type="revision"` - Document type

## Button Types
- `type="primary"` - Main actions (save, create, submit)
- `type="secondary"` - Alternative actions (edit, view)
- `type="success"` - Success confirmations
- `type="danger"` - Destructive actions (delete)
- `type="warning"` - Warning actions
- `type="outline"` - Subtle actions

## Icon Guide
Use Font Awesome 6 icons:
- Dashboard: `fas fa-chart-line`, `fas fa-home`
- Documents: `fas fa-file-pdf`, `fas fa-file-alt`
- Users: `fas fa-users`, `fas fa-user`
- Comments: `fas fa-comments`
- Settings: `fas fa-cog`
- Actions: `fas fa-plus`, `fas fa-edit`, `fas fa-trash`, `fas fa-eye`
- Navigation: `fas fa-arrow-left`, `fas fa-chevron-down`

