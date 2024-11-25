<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="mt-1 block w-full transition duration-300 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-blue-50" 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <!-- New Password -->
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')"  />
            <x-text-input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="mt-1 block w-full transition duration-300 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-blue-50" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="mt-1 block w-full transition duration-300 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-blue-50" 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Save Button with Animation -->
        <div class="flex items-center gap-4">
            <button 
                type="submit" 
                class="bg-[#69b3e3] text-white px-6 py-2 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-300"
            >
                {{ __('Save') }}
            </button>

            <!-- Animated Save Confirmation -->
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 dark:text-green-400 transition-opacity duration-300 ease-in-out"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
