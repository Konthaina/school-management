@props(['user', 'profile', 'title' => 'Profile', 'role' => null, 'status' => 'active'])

@php
    $picture = $profile?->profile_picture ? asset('storage/' . $profile->profile_picture) : null;
    $roleName = $role ?? $user->role->name ?? 'User';
    $isActive = strtolower($status) === 'active';
@endphp

<div class="bg-gray-100 dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-6xl mx-auto px-4 sm:px-8 py-10">

        <div class="flex flex-col sm:flex-row gap-6 sm:gap-10 items-start sm:items-center">

            <!-- Profile Picture -->
            <div class="relative shrink-0">
                @if($picture)
                    <img src="{{ $picture }}" alt="{{ $user->name }}"
                         class="w-32 h-32 sm:w-40 sm:h-40 rounded-lg object-cover shadow" />
                @else
                    <div class="w-32 h-32 sm:w-40 sm:h-40 rounded-lg bg-gray-300 dark:bg-gray-700 flex items-center justify-center shadow">
                        <i class="fas fa-user text-4xl text-gray-500"></i>
                    </div>
                @endif

                <span class="absolute bottom-1 right-1 block w-4 h-4 rounded-full border-2 border-white dark:border-gray-900
                    {{ $isActive ? 'bg-green-500' : 'bg-gray-500' }}">
                </span>
            </div>

            <!-- Info -->
            <div class="flex-1 min-w-0">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white truncate">
                    {{ $user->name }}
                </h1>

                <p class="text-gray-600 dark:text-gray-300 mt-1 truncate flex items-center gap-2">
                    <i class="fas fa-envelope text-gray-500"></i>
                    {{ $user->email }}
                </p>

                <!-- Badges -->
                <div class="flex flex-wrap gap-2 mt-3">

                    <span class="px-3 py-1 rounded-full text-xs font-medium 
                        {{ $isActive ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                        <i class="fas fa-circle mr-1 text-[8px]"></i>
                        {{ ucfirst($status) }}
                    </span>

                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-user-tag mr-1"></i>{{ $roleName }}
                    </span>

                    @if($user->email_verified_at)
                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            <i class="fas fa-check-circle mr-1"></i>Verified
                        </span>
                    @endif
                </div>

                <!-- Quick Info Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mt-6">

                    @if($profile?->phone_number)
                        <div class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-2">
                            <i class="fas fa-phone text-gray-500"></i>
                            <span class="truncate">{{ $profile->phone_number }}</span>
                        </div>
                    @endif

                    @if($profile?->address)
                        <div class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-gray-500"></i>
                            <span class="truncate">{{ Str::limit($profile->address, 25) }}</span>
                        </div>
                    @endif

                    @if($profile?->institution)
                        <div class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-2">
                            <i class="fas fa-building text-gray-500"></i>
                            <span class="truncate">{{ Str::limit($profile->institution, 25) }}</span>
                        </div>
                    @endif

                    <div class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-2">
                        <i class="fas fa-calendar text-gray-500"></i>
                        {{ $user->created_at->format('M Y') }}
                    </div>

                    @if($profile)
                        <div class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-2">
                            <i class="fas fa-history text-gray-500"></i>
                            {{ $profile->updated_at->diffForHumans() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <!-- Bio -->
        @if($profile?->bio)
            <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed italic">
                    <i class="fas fa-quote-left mr-2 text-gray-500"></i>
                    {{ $profile->bio }}
                </p>
            </div>
        @endif

    </div>
</div>
