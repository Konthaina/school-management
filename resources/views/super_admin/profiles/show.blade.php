<x-app-layout>
    <x-slot name="header">
        <!-- Header handled by profile-header component below -->
    </x-slot>

    <!-- Enhanced Profile Header (simple style) -->
    <x-profile-header :user="$profile->user" :profile="$profile" title="Profile Details" :role="$profile->user->role->name" />

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Action Buttons -->
            <div class="flex gap-3 flex-wrap">
                <a href="{{ route('profiles.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-medium rounded-lg transition">
                    <i class="fas fa-arrow-left mr-2" aria-hidden="true"></i>
                    Back to Profiles
                </a>

                <a href="{{ route('profiles.edit', $profile->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition">
                    <i class="fas fa-edit mr-2" aria-hidden="true"></i>
                    Edit Profile
                </a>
            </div>

            <!-- Information Grid -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 sm:rounded-lg p-6 sm:p-8 space-y-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-id-card text-indigo-600" aria-hidden="true"></i>
                    Contact & Personal Information
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div class="p-4 card-box">
                        <p class="card-label">Full Name</p>
                        <p class="card-value mt-2">{{ $profile->user->name }}</p>
                    </div>

                    <!-- Email -->
                    <div class="p-4 card-box">
                        <p class="card-label">Email Address</p>
                        <p class="card-value mt-2 break-all text-sm">{{ $profile->user->email }}</p>
                    </div>

                    <!-- Phone Number -->
                    <div class="p-4 card-box">
                        <p class="card-label">Phone Number</p>
                        <p class="card-value mt-2">
                            @if($profile->phone_number)
                                <i class="fas fa-phone text-indigo-600 mr-2" aria-hidden="true"></i>
                                {{ $profile->phone_number }}
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>

                    <!-- Address -->
                    <div class="p-4 card-box">
                        <p class="card-label">Address</p>
                        <p class="card-value mt-2">
                            @if($profile->address)
                                <i class="fas fa-map-marker-alt text-indigo-600 mr-2" aria-hidden="true"></i>
                                {{ $profile->address }}
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>

                    <!-- Date of Birth -->
                    <div class="p-4 card-box">
                        <p class="card-label">Date of Birth</p>
                        <p class="card-value mt-2">
                            @if($profile->date_of_birth)
                                <i class="fas fa-birthday-cake text-indigo-600 mr-2" aria-hidden="true"></i>
                                {{ \Carbon\Carbon::parse($profile->date_of_birth)->format('M d, Y') }}
                                <span class="text-gray-500 dark:text-gray-400 text-sm">({{ \Carbon\Carbon::parse($profile->date_of_birth)->age }} yrs)</span>
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Not provided</span>
                            @endif
                        </p>
                    </div>

                    <!-- Institution -->
                    <div class="p-4 card-box">
                        <p class="card-label">Institution</p>
                        <p class="card-value mt-2">
                            @if($profile->institution)
                                <i class="fas fa-building text-indigo-600 mr-2" aria-hidden="true"></i>
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
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 sm:rounded-lg p-6 sm:p-8">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-comment text-indigo-600" aria-hidden="true"></i>
                    Bio
                </h2>

                <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed italic">{{ $profile->bio }}</p>
                </div>
            </div>
            @endif

            <!-- Account Details -->
            <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 sm:rounded-lg p-6 sm:p-8 space-y-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-cog text-indigo-600" aria-hidden="true"></i>
                    Account Details & Metadata
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Role -->
                    <div class="p-4 card-box">
                        <p class="card-label">Role</p>
                        <p class="card-value mt-2">
                            <span class="badge">
                                <i class="fas fa-crown mr-1" aria-hidden="true"></i>
                                {{ $profile->user->role->name ?? 'User' }}
                            </span>
                        </p>
                    </div>

                    <!-- Status -->
                    <div class="p-4 card-box">
                        <p class="card-label">Status</p>
                        <p class="card-value mt-2">
                            <span class="badge status-badge">
                                <i class="fas fa-check-circle mr-1" aria-hidden="true"></i>
                                Active
                            </span>
                        </p>
                    </div>

                    <!-- Account Created -->
                    <div class="p-4 card-box">
                        <p class="card-label">Account Created</p>
                        <p class="card-value mt-2">
                            <i class="fas fa-calendar text-indigo-600 mr-2" aria-hidden="true"></i>
                            {{ $profile->user->created_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- Last Updated -->
                    <div class="p-4 card-box">
                        <p class="card-label">Profile Updated</p>
                        <p class="card-value mt-2">
                            <i class="fas fa-history text-indigo-600 mr-2" aria-hidden="true"></i>
                            {{ $profile->updated_at->format('M d, Y') }}
                        </p>
                    </div>

                    <!-- User ID -->
                    <div class="p-4 card-box">
                        <p class="card-label">User ID</p>
                        <p class="card-value mt-2 font-mono text-sm">
                            <i class="fas fa-code text-indigo-600 mr-2" aria-hidden="true"></i>
                            {{ $profile->user_id }}
                        </p>
                    </div>

                    <!-- Profile ID -->
                    <div class="p-4 card-box">
                        <p class="card-label">Profile ID</p>
                        <p class="card-value mt-2 font-mono text-sm">
                            <i class="fas fa-code text-indigo-600 mr-2" aria-hidden="true"></i>
                            {{ $profile->id }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Minimal styling for simple clean look -->
    <style>
        .card-box {
            @apply bg-white/50 dark:bg-gray-900/60 rounded-lg border border-gray-100 dark:border-gray-800 p-4;
        }
        .card-label {
            @apply text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide;
        }
        .card-value {
            @apply text-gray-900 dark:text-white font-semibold;
        }
        .badge {
            @apply inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800;
        }
        .status-badge {
            @apply bg-green-100 text-green-800;
        }

        /* small responsive tweaks */
        @media (prefers-color-scheme: dark) {
            .card-box { background-color: rgba(17,24,39,0.6); }
        }
    </style>
</x-app-layout>
