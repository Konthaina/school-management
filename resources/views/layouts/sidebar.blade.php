<div class="bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 w-full h-full flex flex-col">
    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2 px-4 py-6">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('super_admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('dashboard', 'super_admin.dashboard') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-chart-line w-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Manage Document -->
            <li>
                <a href="{{ route('documents.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('documents.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-file-pdf w-5"></i>
                    <span>Documents</span>
                </a>
            </li>

            <!-- Manage Users -->
            <li>
                <a href="{{ route('users.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('users.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-users w-5"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Manage Comments -->
            <li>
                <a href="{{ route('comments.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('comments.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-comments w-5"></i>
                    <span>Comments</span>
                </a>
            </li>

            <!-- Manage Profiles -->
            <li>
                <a href="{{ route('profiles.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('profiles.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-user-circle w-5"></i>
                    <span>Profiles</span>
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="{{ route('settings.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all duration-200 {{ request()->routeIs('settings.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700' }}">
                    <i class="fas fa-cog w-5"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer Info -->
    <div class="border-t border-slate-200 dark:border-slate-700 px-4 py-4">
        <div class="text-xs text-slate-600 dark:text-slate-400 text-center">
            <p class="font-semibold">School Management</p>
            <p>v1.0.0</p>
        </div>
    </div>
</div>
