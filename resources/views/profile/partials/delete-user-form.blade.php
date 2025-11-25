<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-red-600 dark:text-red-400 flex items-center gap-2">
            <i class="fas fa-exclamation-triangle"></i>
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <!-- Warning Alert -->
    <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
        <div class="flex items-start gap-3">
            <i class="fas fa-exclamation-circle text-red-600 dark:text-red-400 text-lg mt-0.5 flex-shrink-0"></i>
            <div>
                <h3 class="font-semibold text-red-900 dark:text-red-200">This action cannot be undone</h3>
                <p class="text-red-800 dark:text-red-300 text-sm mt-1">
                    Before deleting your account, please download any data or information that you wish to retain. This includes:
                </p>
                <ul class="text-red-800 dark:text-red-300 text-sm mt-2 ml-6 list-disc space-y-1">
                    <li>Your profile information</li>
                    <li>Documents and files you've uploaded</li>
                    <li>Any other personal data</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Delete Button -->
    <div>
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="flex items-center gap-2"
        >
            <i class="fas fa-trash-alt mr-2"></i>
            {{ __('Delete My Account') }}
        </x-danger-button>
    </div>

    <!-- Confirmation Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-6">
            @csrf
            @method('delete')

            <!-- Modal Header -->
            <div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-exclamation-circle text-red-600 dark:text-red-400"></i>
                    {{ __('Are you sure?') }}
                </h2>
                <p class="mt-3 text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                </p>
                <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm font-medium">
                    {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <!-- Password Input -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <x-input-label for="password" value="{{ __('Password Confirmation') }}" class="mb-2" />
                <div class="relative">
                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="pl-10 block w-full"
                        placeholder="{{ __('Enter your password') }}"
                        autocomplete="current-password"
                    />
                </div>
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    {{ __('This action is permanent and cannot be reversed.') }}
                </p>
            </div>

            <!-- Modal Actions -->
            <div class="flex justify-end gap-3 border-t border-gray-200 dark:border-gray-700 pt-6">
                <x-secondary-button x-on:click="$dispatch('close')" type="button">
                    <i class="fas fa-times mr-2"></i>
                    {{ __('Cancel') }}
                </x-secondary-button>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm transition">
                    <i class="fas fa-trash-alt mr-2"></i>
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
