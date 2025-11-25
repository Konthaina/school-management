<x-app-layout>
    <x-slot name="header">
        <!-- Header uses default slot, content below -->
    </x-slot>

    <!-- Enhanced Profile Header -->
    <x-profile-header :user="$user" :profile="$profile" title="My Profile" />

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Tab Navigation -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg" x-data="{ activeTab: 'personal' }">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex space-x-8 px-4 sm:px-8" aria-label="Tabs">
                        <button @click="activeTab = 'personal'" 
                                :class="activeTab === 'personal' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition">
                            <i class="fas fa-user mr-2"></i>Personal Info
                        </button>
                        <button @click="activeTab = 'security'" 
                                :class="activeTab === 'security' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition">
                            <i class="fas fa-lock mr-2"></i>Security
                        </button>
                        <button @click="activeTab = 'danger'" 
                                :class="activeTab === 'danger' ? 'border-indigo-500 text-indigo-600 dark:text-indigo-400' : 'border-transparent text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300'"
                                class="py-4 px-1 border-b-2 font-medium text-sm transition">
                            <i class="fas fa-exclamation-triangle mr-2"></i>Danger Zone
                        </button>
                    </nav>
                </div>

                <!-- Personal Info Tab -->
                <div x-show="activeTab === 'personal'" class="p-4 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <!-- Security Tab -->
                <div x-show="activeTab === 'security'" class="p-4 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>

                <!-- Danger Zone Tab -->
                <div x-show="activeTab === 'danger'" class="p-4 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- Info Card -->
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4 sm:p-6">
                <div class="flex gap-3">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-600 dark:text-blue-400 text-lg mt-0.5"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-blue-900 dark:text-blue-200">Profile Management</h3>
                        <p class="text-blue-800 dark:text-blue-300 text-sm mt-1">Keep your profile information up to date. Your data is secure and only visible to authorized users.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
