<nav class="bg-white shadow-lg shadow-gray-300 text-gray-600 w-60 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 h-full hidden sm:block">
    <!-- Primary Navigation Menu -->
    <div class="text-lg px-4 py-4 font-bold text-gray-400">
        Smart<span class="text-[#599ac5]">Tasker</span> 
      </div>
    <div class="max-w-7xl mx-auto flex justify-start px-6">
        <div class="flex flex-col py-20 items-center h-screen">
           

            <!-- Navigation Links -->
            <div class="hidden sm:-my-px sm:mt-10 sm:flex">
                <x-nav-link class="items-center gap-2" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                   
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="text-black dark:text-gray-100 size-6">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    
                 
                    {{ __('Dashboard') }}
                </x-nav-link>
            </div>

            <div class="hidden sm:-my-px sm:mt-10 sm:flex">
                <x-nav-link class="items-center gap-2" :href="route('tasks')" :active="request()->routeIs('tasks') || request()->routeIs('tasks.show')">
    
                        <svg viewBox="0 0 32 32" class="size-6 text-black dark:text-gray-100"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <rect fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" height="25" rx="2" width="10" x="4" y="1">
                            </rect>
                            <rect fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" height="18" rx="2" width="10" x="19" y="1">
                            </rect>
                        </svg>
                   
                   
                    {{ __('Tasks') }}
                </x-nav-link>
            </div>

            <div class="hidden sm:-my-px sm:mt-10 sm:flex">
                <x-nav-link class="items-center gap-2" :href="route('teams')" :active="request()->routeIs('teams') || request()->routeIs('teams.show')">
                    
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-6 text-black dark:text-gray-100">
                            <path
                                d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                        </svg>
                    {{ __('Teams') }}
                </x-nav-link>

            </div>
            <div class="hidden sm:-my-px sm:mt-10 sm:flex">
                <x-nav-link class="items-center gap-2" :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                   
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            class="text-black dark:text-gray-100 size-6">
                            <circle cx="12" cy="8" r="4" stroke="none" fill="currentColor" />
                            <path d="M12 14c-4 0-6 2-6 4v1h12v-1c0-2-2-4-6-4z" stroke="none" fill="currentColor" />
                        </svg>
                  
                    {{ __('Profile') }}
                </x-nav-link>
            </div>
            <div class="hidden sm:-my-px sm:mt-10 sm:flex">
                <x-nav-link class="items-center gap-2" :href="route('tasks')" :active="request()->routeIs('tasks') || request()->routeIs('tasks.show')">
                   
                        <svg viewBox="0 0 32 32" class="size-6 text-black dark:text-gray-100"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <rect fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" height="25" rx="2" width="10" x="4" y="1">
                            </rect>
                            <rect fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" height="18" rx="2" width="10" x="19" y="1">
                            </rect>
                        </svg>
                
                    <a href="{{ route('chatify') }}" 
                        class="text-black  hover:underline transition">
                         Message
                     </a>
                </x-nav-link>
            </div>
        </div>
    </div>
</nav>
