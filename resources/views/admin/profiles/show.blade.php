<x-app-layout>
    <x-slot name="header">
        <!-- Header handled by profile-header component below -->
    </x-slot>

    <!-- Enhanced Profile Header -->
    <x-profile-header :user="$profile->user" :profile="$profile" title="Profile Details" :role="$profile->user->role->name" />

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Action Buttons -->
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('admin.profiles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-medium rounded-lg transition shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Profiles
                </a>
                @if(auth()->user()->role_id === 5 || (auth()->user()->role_id === 4 && $profile->user->role_id !== 5))
                    <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition shadow-sm">
                        <i class="fas fa-edit mr-2"></i>Edit Profile
                    </a>
                @endif
            </div>

            <!-- Information Grid -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 sm:p-8 space-y-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-id-card text-indigo-600 dark:text-indigo-400"></i>
                    Contact Information
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Full Name</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $profile->user->name }}</p>
                    </div>

                    <!-- Email -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Email Address</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2 break-all text-sm">{{ $profile->user->email }}</p>
                    </div>

                    <!-- Phone Number -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Phone Number</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2 flex items-center gap-2">
                            @if($profile->phone_number)
                                <i class="fas fa-phone text-indigo-600 dark:text-indigo-400"></i>
                                {{ $profile->phone_number }}
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>

                    <!-- Address -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Address</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2 flex items-center gap-2">
                            @if($profile->address)
                                <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400"></i>
                                {{ $profile->address }}
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>

                    <!-- Date of Birth -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Date of Birth</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2">
                            @if($profile->date_of_birth)
                                <i class="fas fa-birthday-cake text-indigo-600 dark:text-indigo-400 mr-2"></i>
                                {{ \Carbon\Carbon::parse($profile->date_of_birth)->format('M d, Y') }}
                                <span class="text-gray-600 dark:text-gray-400 text-sm">({{ \Carbon\Carbon::parse($profile->date_of_birth)->age }} yrs)</span>
                            @else
                                Not provided
                            @endif
                        </p>
                    </div>

                    <!-- Institution -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600 hover:shadow-md transition">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Institution</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2 flex items-center gap-2">
                            @if($profile->institution)
                                <i class="fas fa-building text-indigo-600 dark:text-indigo-400"></i>
                                {{ $profile->institution }}
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bio Section -->
            @if($profile->bio)
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 sm:p-8">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-comment text-indigo-600 dark:text-indigo-400"></i>
                    Bio
                </h2>
                <div class="p-4 bg-gradient-to-br from-indigo-50 to-blue-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-indigo-200 dark:border-gray-600">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed italic">{{ $profile->bio }}</p>
                </div>
            </div>
            @endif

            <!-- Account Details -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 sm:p-8 space-y-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-cog text-indigo-600 dark:text-indigo-400"></i>
                    Account Details
                </h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Role -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Role</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                <i class="fas fa-user-circle mr-1"></i>
                                {{ $profile->user->role->name ?? 'User' }}
                            </span>
                        </p>
                    </div>

                    <!-- Account Created -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Account Created</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2">
                            <i class="fas fa-calendar text-indigo-600 dark:text-indigo-400 mr-2"></i>
                            {{ $profile->user->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- Last Updated -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Profile Updated</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2">
                            <i class="fas fa-history text-indigo-600 dark:text-indigo-400 mr-2"></i>
                            {{ $profile->updated_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- Profile ID -->
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 rounded-lg border border-blue-200 dark:border-gray-600">
                        <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Profile ID</p>
                        <p class="text-gray-900 dark:text-white font-semibold mt-2 font-mono text-sm">
                            <i class="fas fa-code text-indigo-600 dark:text-indigo-400 mr-2"></i>
                            {{ $profile->id }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
