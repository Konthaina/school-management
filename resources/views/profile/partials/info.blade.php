<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
            <i class="fas fa-user-circle text-indigo-600 dark:text-indigo-400"></i>
            Your Profile Summary
        </h2>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">View your current profile information</p>
    </header>

    <!-- Profile Information Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Name -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Full Name</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $user->name }}</p>
        </div>

        <!-- Email -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Email</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2 break-all text-sm">{{ $user->email }}</p>
        </div>

        <!-- Phone -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Phone</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $profile->phone_number ?? 'Not set' }}</p>
        </div>

        <!-- Date of Birth -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Date of Birth</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">
                @if($profile->date_of_birth)
                    {{ \Carbon\Carbon::parse($profile->date_of_birth)->format('M d, Y') }}
                @else
                    Not set
                @endif
            </p>
        </div>

        <!-- Address -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 sm:col-span-2">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Address</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $profile->address ?? 'Not set' }}</p>
        </div>

        <!-- Institution -->
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 sm:col-span-2">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Institution/Organization</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $profile->institution ?? 'Not set' }}</p>
        </div>

        <!-- Bio -->
        @if($profile->bio)
        <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 sm:col-span-2">
            <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase tracking-wide">Bio</p>
            <p class="text-gray-900 dark:text-white font-semibold mt-2">{{ $profile->bio }}</p>
        </div>
        @endif
    </div>

    <!-- Info Card -->
    <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
        <div class="flex gap-3">
            <i class="fas fa-info-circle text-blue-600 dark:text-blue-400 text-lg mt-0.5 flex-shrink-0"></i>
            <div>
                <h3 class="font-semibold text-blue-900 dark:text-blue-200 text-sm">Profile Information</h3>
                <p class="text-blue-800 dark:text-blue-300 text-xs mt-1">View your current profile information above. Use the form below to update any of your details.</p>
            </div>
        </div>
    </div>
</section>
