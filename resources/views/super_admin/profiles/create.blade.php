<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-gray-900 dark:text-white leading-tight flex items-center gap-3">
                    <a href="{{ route('profiles.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    Create New Profile
                </h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Add profile information for a user</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-exclamation-circle text-red-600 dark:text-red-400 text-lg mt-0.5 flex-shrink-0"></i>
                        <div>
                            <h3 class="font-semibold text-red-900 dark:text-red-200">Please fix the following errors:</h3>
                            <ul class="text-red-800 dark:text-red-300 text-sm mt-2 ml-6 list-disc space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Create Form Card -->
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg overflow-hidden">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 h-32"></div>
                
                <div class="px-6 sm:px-8 py-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Profile Information</h3>

                    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                        @csrf

                        <!-- User Selection Section -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                                <i class="fas fa-user text-purple-600 dark:text-purple-400"></i>
                                Select User
                            </h4>

                            <div>
                                <label for="user_id" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                    <i class="fas fa-users mr-2 text-gray-400"></i>User
                                </label>
                                <select name="user_id" 
                                        id="user_id" 
                                        required
                                        class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-purple-500 dark:focus:ring-purple-600 focus:border-purple-500 dark:focus:border-purple-600 sm:text-sm shadow-sm">
                                    <option value="">-- Select a User --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                                            {{ $user->name }} 
                                            <span class="text-gray-500">({{ $user->role->name ?? 'User' }})</span>
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1"><i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                                <i class="fas fa-phone text-purple-600 dark:text-purple-400"></i>
                                Contact Information
                            </h4>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Phone Number -->
                                <div>
                                    <label for="phone_number" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                        Phone Number
                                    </label>
                                    <input type="tel" 
                                           name="phone_number" 
                                           id="phone_number" 
                                           value="{{ old('phone_number') }}"
                                           placeholder="+1 (555) 000-0000"
                                           class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-purple-500 dark:focus:ring-purple-600 focus:border-purple-500 dark:focus:border-purple-600 sm:text-sm shadow-sm">
                                    @error('phone_number')
                                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Date of Birth -->
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                        Date of Birth
                                    </label>
                                    <input type="date" 
                                           name="date_of_birth" 
                                           id="date_of_birth" 
                                           value="{{ old('date_of_birth') }}"
                                           class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-purple-500 dark:focus:ring-purple-600 focus:border-purple-500 dark:focus:border-purple-600 sm:text-sm shadow-sm">
                                    @error('date_of_birth')
                                        <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-purple-600 dark:text-purple-400"></i>
                                Address Information
                            </h4>

                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                    Street Address
                                </label>
                                <input type="text" 
                                       name="address" 
                                       id="address" 
                                       value="{{ old('address') }}"
                                       placeholder="123 Main Street"
                                       class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-purple-500 dark:focus:ring-purple-600 focus:border-purple-500 dark:focus:border-purple-600 sm:text-sm shadow-sm">
                                @error('address')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Bio Section -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                                <i class="fas fa-comment text-purple-600 dark:text-purple-400"></i>
                                Bio
                            </h4>

                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-900 dark:text-white mb-2">
                                    About this user
                                </label>
                                <textarea name="bio" 
                                          id="bio" 
                                          rows="4"
                                          placeholder="Enter a brief biography or description"
                                          class="block w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:ring-purple-500 dark:focus:ring-purple-600 focus:border-purple-500 dark:focus:border-purple-600 sm:text-sm shadow-sm">{{ old('bio') }}</textarea>
                                @error('bio')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Profile Picture Section -->
                        <div>
                            <h4 class="text-base font-semibold text-gray-900 dark:text-white mb-4 pb-3 border-b border-gray-200 dark:border-gray-700 flex items-center gap-2">
                                <i class="fas fa-image text-purple-600 dark:text-purple-400"></i>
                                Profile Picture
                            </h4>

                            <div>
                                <label for="profile_picture" class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-2"></i>
                                        <p class="text-sm text-gray-600 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                    <input id="profile_picture" name="profile_picture" type="file" class="hidden" accept="image/*" />
                                </label>
                                @error('profile_picture')
                                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex gap-3 border-t border-gray-200 dark:border-gray-700 pt-8">
                            <a href="{{ route('profiles.index') }}" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white font-medium rounded-lg transition">
                                <i class="fas fa-times mr-2"></i>Cancel
                            </a>
                            <button type="submit" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg shadow-sm transition">
                                <i class="fas fa-plus-circle mr-2"></i>Create Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="mt-6 p-4 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
                <div class="flex gap-3">
                    <i class="fas fa-info-circle text-purple-600 dark:text-purple-400 text-lg mt-0.5 flex-shrink-0"></i>
                    <div>
                        <h3 class="font-semibold text-purple-900 dark:text-purple-200">New Profile</h3>
                        <p class="text-purple-800 dark:text-purple-300 text-sm mt-1">As a super admin, you can create profiles for any user. Fill in the user's profile information. All fields are optional except selecting a user. You can always update this information later.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
