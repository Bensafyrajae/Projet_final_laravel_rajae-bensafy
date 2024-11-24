<x-guest-layout>
    <!-- Informative Text -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-4 rounded-lg shadow-md max-w-md mx-auto transition-transform transform scale-95 hover:scale-100 duration-300 ease-in-out">
        {{ __('Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Meme Addition -->
    <div class="flex justify-center mb-4">
        <img src="/path-to-your-meme-image.jpg" alt="Funny meme" class="w-32 h-32 rounded-full shadow-md hover:animate-bounce">
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 max-w-md mx-auto" :status="session('status')" />

    <!-- Form -->
    <form method="POST" action="{{ route('password.email') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto transition-transform transform scale-95 hover:scale-100 duration-300 ease-in-out">
        @csrf

        <!-- Email Address -->
        <div class="mb-4 group">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 group-hover:text-indigo-500 transition duration-300 ease-in-out" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:scale-105 transform transition duration-300 ease-in-out" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-md shadow-lg hover:from-indigo-600 hover:to-purple-700 transform hover:scale-105 transition duration-300 ease-in-out">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
