<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto transition transform scale-95 hover:scale-100 duration-300 ease-in-out">
        @csrf

        <!-- Name -->
        <div class="mb-4 group">
            <x-input-label for="name" :value="__('Name')" class="text-gray-700 group-hover:text-indigo-500 transition duration-300 ease-in-out" />
            <x-text-input 
                id="name" 
                class="block mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:scale-105 transform transition duration-300 ease-in-out" 
                type="text" 
                name="name" 
                :value="old('name')" 
                required 
                autofocus 
                autocomplete="name" 
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

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
        {{-- <div class="mt-4">
            <x-input-label for="profile_image" :value="__('Profile Image')" />
            <input id="profile_image" type="file" name="profile_image" class="block mt-1 w-full" accept="image/*"
                required />
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div> --}}
        <!-- Already Registered -->
        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('login') }}" 
                class="text-sm  text-indigo-600 hover:text-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                {{ __('Already registered?') }}
            </a>
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-between">
            <x-primary-button class="w-full py-3 flex justify-center bg-indigo-600 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-indigo-700 transform hover:scale-105 transition-all duration-300 ease-in-out">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
