<x-app-layout>
    <x-slot name="header">
        <div class="hidden sm:flex sm:ml-auto sm:mr-3">
            @php
                $user = auth()->user();
            @endphp

            @if($user->teams_created < 5)
                <!-- Button to Create Team if User Has Not Reached Limit -->
                <button type="button" onclick="addTeamModal.show()"
                    class="flex justify-center items-center px-4 py-2 gap-2 bg-[#69b3e3] hover:bg-[#69b3e3] text-white rounded-md font-bold text-sm tracking-wide transition-all duration-200 ease-in-out">
                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Create Team
                </button>
            @else
                <!-- Payment Button -->
                <a href="{{ route('payment.page') }}"
                    class="flex justify-center items-center px-4 py-2 gap-2 bg-red-600 hover:bg-red-500 text-white rounded-md font-bold text-sm tracking-wide transition-all duration-200 ease-in-out">
                    <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Pay to Create More Teams
                </a>
            @endif
        </div>
    </x-slot>

    <div class="mx-10 dark:bg-gray-900">
        <!-- Header Section -->
            <div class="text center">
                <div>
                    <h1 class="text-2xl font-bold dark:text-gray-100">Hello, {{ $user->name }}👋</h1>
                    <p class="text-xl text-gray-500 dark:text-gray-400">{{ \Carbon\Carbon::now()->isoFormat('dddd, MMMM D, YYYY') }}</p>
                </div>
            </div>
        

        <!-- Main Metrics Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
            <!-- Number of Teams -->
            <div class="bg-white text-white dark:bg-gray-800 p-4 rounded-lg shadow-md transform transition hover:scale-105 duration-200">
                <div class="flex flex-col items-center gap-4">
                <div class="bg-[#69b3e3] p-3 rounded-full">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17 10c0-1.1-.9-2-2-2H9v4h6c1.1 0 2-.9 2-2zM5 8H4c-1.1 0-2 .9-2 2s.9 2 2 2h1v4h1V8H5zm2 0h2v8H7V8zm4-6h2v14h-2V2z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl text-black font-bold">{{ Auth::user()->teams->count() }} Teams</h2>
                    <p class="text-gray-500 text-sm">
                        You currently have {{ Auth::user()->teams->count() }} active teams. Collaborate and grow your projects with ease.
                    </p>
                </div>
            </div>
            </div>

            <!-- Number of Tasks -->
            <div class="bg-white text-black dark:bg-gray-800 p-4 rounded-lg shadow-md transform transition hover:scale-105 duration-200">
            
                    <div class="flex flex-col items-center gap-4">
                        <div class="bg-[#69b3e3] p-3 rounded-full">
                            <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 000 4h12a2 2 0 100-4H4zm0 6a2 2 0 000 4h8a2 2 0 100-4H4zm0 6a2 2 0 100 4h6a2 2 0 100-4H4z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold"> Tasks</h2>
                            <p class="text-gray-500 text-sm">
                                You have  tasks in progress. Stay productive and complete your goals.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('tasks') }}" class="mt-4 bg-[#69b3e3] hover:bg-blue-400 px-4 py-2 rounded-md text-white text-sm">
                        View Tasks
                    </a>
               
            </div>

            <!-- On Going Tasks -->
            <div class="bg-white text-white dark:bg-gray-800 p-4 rounded-lg shadow-md transform transition hover:scale-105 duration-200 flex flex-col items-start">
                <h3 class="text-lg font-semibold text-black dark:text-gray-200">On Going Task</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Best performing employee ranking</p>
                             
                 <a href="{{ route('tasks') }}" class="mt-4 bg-[#69b3e3] hover:bg-blue-400 px-4 py-2 rounded-md text-white text-sm">
                    View Tasks
                </a>
            </div>

            <!-- Graph and Analysis -->
            <div class="bg-white text-white dark:bg-gray-800 p-4 rounded-lg shadow-md transform transition hover:scale-105 duration-200">
                <h3 class="text-lg font-semibold text-black dark:text-gray-200">Graphs and Analysis</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Projects completed per month</p>
                
        </div>

        <!-- Calendar Section -->
        <div class="w-[74vw]">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Calendar</h2>
                <div id="calendar" class="mt-4 animate-pulse"></div>
               
            </div>
        </div>
    </div>
   
</x-app-layout>
@vite('resources/js/calender.js')

