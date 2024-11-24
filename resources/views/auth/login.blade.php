<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" 
        class="bg-white p-8 rounded-xl shadow-lg max-w-lg mx-auto transition transform scale-95 hover:scale-100 hover:shadow-xl duration-300 ease-in-out">
        @csrf

        <!-- Email Address -->
        <div class="mb-6 group">
            <x-input-label for="email" :value="__('Email')" 
                class="text-gray-800 text-lg font-semibold group-hover:text-indigo-600 transition-all duration-300 ease-in-out" />
            <x-text-input 
                id="email" 
                class="block mt-2 w-full border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transform focus:scale-105 transition duration-300 ease-in-out" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autocomplete="email" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-6 group">
            <x-input-label for="password" :value="__('Password')" 
                class="text-gray-800 text-lg font-semibold group-hover:text-indigo-600 transition-all duration-300 ease-in-out" />
            <x-text-input 
                id="password" 
                class="block mt-2 w-full border border-gray-300 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transform focus:scale-105 transition duration-300 ease-in-out" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" 
                class="inline-flex items-center text-sm text-gray-700 hover:text-indigo-600 group transition-all duration-300 ease-in-out">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition transform focus:scale-110 duration-300 ease-in-out" 
                    name="remember" 
                />
                <span class="ml-2">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                    class="text-sm text-indigo-600 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <div class="flex justify-center">
            <x-primary-button 
                class="w-full py-3 flex justify-center bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-300 transform hover:scale-105 transition-all duration-300 ease-in-out">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
