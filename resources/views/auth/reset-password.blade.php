<x-guest-layout>
    <!-- Meme Integration -->
    <div class="flex justify-center mb-4">
        <img src="/path-to-your-meme-image.jpg" alt="Funny meme" class="w-32 h-32 rounded-full shadow-md hover:animate-bounce">
    </div>

    <!-- Informative Text -->
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 bg-gradient-to-r from-indigo-500 to-purple-600 text-white p-4 rounded-lg shadow-md max-w-md mx-auto transition-transform transform scale-95 hover:scale-100 duration-300 ease-in-out">
        {{ __('Please enter your email and a new password to reset your account.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 max-w-md mx-auto" :status="session('status')" />

    <form method="POST" action="{{ route('password.store') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto transition transform scale-95 hover:scale-100 duration-300 ease-in-out">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-4 group">
            <x-input-label for="email" :value="__('Email')" class="text-gray-700 group-hover:text-indigo-500 transition duration-300 ease-in-out" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:scale-105 transform transition duration-300 ease-in-out" 
                type="email" 
                name="email" 
                :value="old('email', $request->email)" 
                required 
                autofocus 
                autocomplete="username" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4 group">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 group-hover:text-indigo-500 transition duration-300 ease-in-out" />
            <x-text-input 
                id="password" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:scale-105 transform transition duration-300 ease-in-out" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4 group">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 group-hover:text-indigo-500 transition duration-300 ease-in-out" />
            <x-text-input 
                id="password_confirmation" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:scale-105 transform transition duration-300 ease-in-out" 
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Reset Password Button -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 transform hover:scale-105 transition duration-300 ease-in-out">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
