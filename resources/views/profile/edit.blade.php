<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <div class="py-12 h-full w-full">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information Form -->
            <div class="p-4 flex justify-center sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Form -->
            <div class="p-4 flex justify-center sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Double Authentication Section -->
            <div class="p-4 flex justify-center items-center flex-col sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4">
                    {{ __('Double Authentication') }}
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
                <button
                    class="bg-blue-600  text-white px-6 py-2 hover:bg-sky-400 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300"
                >
                    {{ __('Activate') }}
                </button>
            </div>

            <!-- Delete Account Section -->
            <div class="p-4 flex justify-center items-center flex-col sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                <h3 class="text-lg font-semibold mb-4">
                    {{ __('Delete Account') }}
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </p>
                <button
                    class="bg-blue-600 hover:bg-blue-300 text-white px-6 py-2 rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-300 "
                >
                    {{ __('Delete') }}
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
