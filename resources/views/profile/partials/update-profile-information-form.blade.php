<section>
    <header class="mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
            <i class="fas fa-user-edit text-indigo-600 dark:text-indigo-400"></i>
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Update your personal information and account details.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('patch')

        <!-- Account Information Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-user text-indigo-600 dark:text-indigo-400"></i>
                Account Information
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Name Field -->
                <div class="sm:col-span-2">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <div class="mt-2 relative">
                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                        <x-text-input id="name" name="name" type="text" class="pl-10 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <!-- Email Field -->
                <div class="sm:col-span-2">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <div class="mt-2 relative">
                        <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                        <x-text-input id="email" name="email" type="email" class="pl-10 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                            <div class="flex items-start gap-3">
                                <i class="fas fa-exclamation-circle text-yellow-600 dark:text-yellow-500 mt-0.5 flex-shrink-0"></i>
                                <div>
                                    <p class="text-sm text-yellow-800 dark:text-yellow-200 font-medium">
                                        {{ __('Your email address is unverified.') }}
                                    </p>
                                    <button type="button" form="send-verification" class="mt-2 inline-flex items-center px-3 py-1.5 text-sm font-medium text-yellow-700 dark:text-yellow-300 hover:underline">
                                        <i class="fas fa-redo mr-1"></i>
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>

                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 p-2 bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-300 rounded text-xs font-medium">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contact Information Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-phone text-indigo-600 dark:text-indigo-400"></i>
                Contact Information
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Phone Number -->
                <div>
                    <x-input-label for="phone_number" :value="__('Phone Number')" />
                    <div class="mt-2 relative">
                        <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                        <x-text-input id="phone_number" name="phone_number" type="tel" class="pl-10 block w-full" :value="old('phone_number', $profile->phone_number ?? '')" autocomplete="tel" placeholder="+1 (555) 000-0000" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>

                <!-- Date of Birth -->
                <div>
                    <x-input-label for="date_of_birth" :value="__('Date of Birth')" />
                    <div class="mt-2 relative">
                        <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                        <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="pl-10 block w-full" :value="old('date_of_birth', $profile->date_of_birth ?? '')" autocomplete="bday" />
                    </div>
                    <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
                </div>
            </div>
        </div>

        <!-- Address Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-map-marker-alt text-indigo-600 dark:text-indigo-400"></i>
                Address Information
            </h3>

            <div>
                <x-input-label for="address" :value="__('Street Address')" />
                <div class="mt-2 relative">
                    <i class="fas fa-map-pin absolute left-3 top-3 text-gray-400 dark:text-gray-500"></i>
                    <x-text-input id="address" name="address" type="text" class="pl-10 block w-full" :value="old('address', $profile->address ?? '')" autocomplete="street-address" placeholder="123 Main Street" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('address')" />
            </div>
        </div>

        <!-- Institution Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-school text-indigo-600 dark:text-indigo-400"></i>
                Organization
            </h3>

            <div>
                <x-input-label for="institution" :value="__('Institution/Organization')" />
                <div class="mt-2 relative">
                    <i class="fas fa-building absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    <x-text-input id="institution" name="institution" type="text" class="pl-10 block w-full" :value="old('institution', $profile->institution ?? '')" autocomplete="organization" placeholder="Your school, university, or organization" />
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('institution')" />
            </div>
        </div>

        <!-- Bio Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-comment text-indigo-600 dark:text-indigo-400"></i>
                About You
            </h3>

            <div>
                <x-input-label for="bio" :value="__('Bio')" />
                <textarea id="bio" name="bio" rows="4" placeholder="Tell us about yourself..." class="mt-2 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 dark:focus:ring-indigo-600 focus:border-indigo-500 dark:focus:border-indigo-600 sm:text-sm">{{ old('bio', $profile->bio ?? '') }}</textarea>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">A brief description about yourself (max 500 characters)</p>
                <x-input-error class="mt-2" :messages="$errors->get('bio')" />
            </div>
        </div>

        <!-- Profile Picture Section -->
        <div>
            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                <i class="fas fa-image text-indigo-600 dark:text-indigo-400"></i>
                Profile Picture
            </h3>

            <div class="space-y-4">
                @if ($profile && $profile->profile_picture)
                    <div class="flex items-center gap-4 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profile Picture" class="w-24 h-24 rounded-lg object-cover shadow-md border border-gray-200 dark:border-gray-600">
                        <div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Current profile picture</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500 mt-1">Upload a new image to replace it</p>
                        </div>
                    </div>
                @endif
                <div class="flex items-center justify-center w-full">
                    <label for="profile_picture" class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                        <input id="profile_picture" name="profile_picture" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm transition">
                <i class="fas fa-save mr-2"></i>{{ __('Save All Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                     class="flex items-center gap-2 text-green-600 dark:text-green-400">
                    <i class="fas fa-check-circle"></i>
                    <p class="text-sm">{{ __('Profile updated successfully!') }}</p>
                </div>
            @endif
        </div>
    </form>
</section>
