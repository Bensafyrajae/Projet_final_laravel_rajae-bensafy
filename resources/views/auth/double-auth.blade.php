<x-guest-layout>
    <!-- Informative Text -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-4 rounded-lg shadow-md max-w-md mx-auto transition-transform transform scale-95 hover:scale-100 duration-300 ease-in-out">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('password.confirm') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto transition-transform transform scale-95 hover:scale-100 duration-300 ease-in-out">
        @csrf

        <!-- Password -->
        <div class="mb-4 group">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 group-hover:text-indigo-600 transition duration-300 ease-in-out" />

            <x-text-input 
                id="password" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transform focus:scale-105 transition duration-300 ease-in-out" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end mt-4">
            <x-primary-button class="py-2 px-6 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-md shadow-lg hover:from-indigo-600 hover:to-purple-700 transform hover:scale-105 transition duration-300 ease-in-out">
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
