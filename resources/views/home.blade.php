<x-app-layout>
    <x-container class="py-8">
        <!-- Welcome Header -->
        <div class="mb-8">
            <x-page-header 
                title="Welcome, {{ Auth::user()->name }}!" 
                description="School Management System Dashboard">
            </x-page-header>
        </div>

        <!-- Status Message -->
        @if (session('status'))
            <div class="mb-6 p-4 bg-success-50 dark:bg-success-900/20 border border-success-200 dark:border-success-800 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-success-600 dark:text-success-400 mr-3"></i>
                    <p class="text-success-800 dark:text-success-200">{{ session('status') }}</p>
                </div>
            </div>
        @endif

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- You are logged in card -->
            <x-card icon="<i class='fas fa-check-circle text-success-600'></i>" title="Login Status" subtitle="Active Session">
                <p class="text-slate-600 dark:text-slate-400 mt-2">You are successfully logged in to the system.</p>
            </x-card>

            <!-- Quick Access card -->
            <x-card icon="<i class='fas fa-lightning-bolt text-primary-600'></i>" title="Quick Access" subtitle="Navigate Easily">
                <p class="text-slate-600 dark:text-slate-400 mt-2">Use the sidebar navigation to access all features.</p>
            </x-card>

            <!-- Help card -->
            <x-card icon="<i class='fas fa-question-circle text-warning-600'></i>" title="Need Help?" subtitle="Resources Available">
                <p class="text-slate-600 dark:text-slate-400 mt-2">Check the documentation or contact support.</p>
            </x-card>
        </div>

        <!-- Main Content Card -->
        <x-card title="Dashboard Overview" subtitle="Get started with your account">
            <div class="space-y-4">
                <div class="flex items-center p-4 bg-slate-50 dark:bg-slate-700/30 rounded-lg border border-slate-200 dark:border-slate-700">
                    <div class="flex-1">
                        <h3 class="font-semibold text-slate-900 dark:text-white">Your Account</h3>
                        <p class="text-sm text-slate-600 dark:text-slate-400 mt-1">
                            <i class="fas fa-user mr-2"></i>{{ Auth::user()->name }} ({{ Auth::user()->role->name ?? 'User' }})
                        </p>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-primary-600 hover:bg-primary-700 text-white transition-colors">
                        <i class="fas fa-edit mr-2"></i>Manage
                    </a>
                </div>

                <div class="pt-4">
                    <h4 class="font-semibold text-slate-900 dark:text-white mb-3">Available Actions</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center text-slate-700 dark:text-slate-300">
                            <i class="fas fa-check text-success-600 mr-3"></i>
                            Manage your profile and settings
                        </li>
                        <li class="flex items-center text-slate-700 dark:text-slate-300">
                            <i class="fas fa-check text-success-600 mr-3"></i>
                            Access documents and resources
                        </li>
                        <li class="flex items-center text-slate-700 dark:text-slate-300">
                            <i class="fas fa-check text-success-600 mr-3"></i>
                            Collaborate with other users
                        </li>
                    </ul>
                </div>
            </div>
        </x-card>
    </x-container>
</x-app-layout>
