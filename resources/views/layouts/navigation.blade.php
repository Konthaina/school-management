<nav x-data="{ open: false }" class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 sticky top-0 z-50 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-full px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo & Branding -->
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                    <div class="bg-primary-600 rounded-lg p-2 group-hover:bg-primary-700 transition-colors">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <div class="hidden sm:flex flex-col">
                        <span class="text-sm font-bold text-slate-900 dark:text-white">NORTON</span>
                        <span class="text-xs text-slate-600 dark:text-slate-400">University</span>
                    </div>
                </a>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center gap-4">
                <!-- Settings Dropdown -->
                <div class="hidden sm:flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2 px-3 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <div class="w-8 h-8 rounded-full overflow-hidden bg-slate-200 dark:bg-slate-700">
                                    @if (Auth::user()->profile && Auth::user()->profile->profile_picture)
                                        <img src="{{ asset('storage/' . Auth::user()->profile->profile_picture) }}" alt="Profile" class="w-full h-full object-cover">
                                    @else
                                        <i class="fas fa-user text-slate-500 mt-1.5 ml-2"></i>
                                    @endif
                                </div>
                                <span class="hidden md:inline text-sm font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-3 border-b border-slate-200 dark:border-slate-600">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-slate-600 dark:text-slate-400">{{ Auth::user()->email }}</p>
                            </div>
                            <x-dropdown-link :href="route('profile.edit')">
                                <i class="fas fa-user-circle mr-2"></i>{{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt mr-2"></i>{{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex lg:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <i :class="open ? 'fas fa-times' : 'fas fa-bars'" class="text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition class="lg:hidden border-t border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 transition-colors">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>
            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 transition-colors">
                <i class="fas fa-user mr-2"></i>Profile
            </a>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded-lg text-slate-700 dark:text-slate-300 hover:bg-white dark:hover:bg-slate-800 transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i>Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
