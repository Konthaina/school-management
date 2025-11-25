<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
            <i class="fas fa-shield-alt text-indigo-600 dark:text-indigo-400"></i>
            {{ __('Update Password') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a strong, unique password to stay secure.') }}
        </p>
    </header>

    <!-- Security Tips -->
    <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
        <h3 class="text-sm font-semibold text-blue-900 dark:text-blue-200 flex items-center gap-2">
            <i class="fas fa-lightbulb"></i>
            Password Security Tips
        </h3>
        <ul class="mt-2 text-sm text-blue-800 dark:text-blue-300 space-y-1 ml-6 list-disc">
            <li>Use at least 8 characters</li>
            <li>Include uppercase and lowercase letters</li>
            <li>Include numbers and special characters</li>
            <li>Avoid common words or patterns</li>
        </ul>
    </div>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="space-y-6">
            <!-- Current Password -->
            <div>
                <div class="relative">
                    <x-input-label for="update_password_current_password" :value="__('Current Password')" />
                    <div class="mt-2 relative">
                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                        <x-text-input 
                            id="update_password_current_password" 
                            name="current_password" 
                            type="password" 
                            class="pl-10 mt-0 block w-full" 
                            autocomplete="current-password" 
                        />
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>
            </div>

            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <!-- New Password -->
                <div class="mb-6">
                    <div class="relative">
                        <x-input-label for="update_password_password" :value="__('New Password')" />
                        <div class="mt-2 relative">
                            <i class="fas fa-lock-open absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                            <x-text-input 
                                id="update_password_password" 
                                name="password" 
                                type="password" 
                                class="pl-10 mt-0 block w-full" 
                                autocomplete="new-password"
                            />
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>
                </div>

                <!-- Confirm Password -->
                <div>
                    <div class="relative">
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        <div class="mt-2 relative">
                            <i class="fas fa-check-circle absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                            <x-text-input 
                                id="update_password_password_confirmation" 
                                name="password_confirmation" 
                                type="password" 
                                class="pl-10 mt-0 block w-full" 
                                autocomplete="new-password"
                            />
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition">
                <i class="fas fa-save mr-2"></i>{{ __('Update Password') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                     class="flex items-center gap-2 text-green-600 dark:text-green-400">
                    <i class="fas fa-check-circle"></i>
                    <p class="text-sm">{{ __('Password updated successfully!') }}</p>
                </div>
            @endif
        </div>
    </form>
</section>
