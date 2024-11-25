<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscription Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" w-[70vw] m-6 text-center text-gray-900 dark:text-gray-100">
                    <p>Unlimited Teams, Infinite Productivity
                        Empower your organization with seamless collaboration! Our unlimited teams plan allows you to:
                       <ul>
                       <li class="flex flex-row"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                              </svg><p>Create Unlimited Teams: Build and manage as many teams as you need, no restrictions.</p></li>
                       <li class="flex flex-row"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                              </svg><p>Collaborate Efficiently: Share tasks, track progress, and achieve goals together.</p></li>
                       <li class="flex flex-row"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                              </svg> <p>Centralize Management: Keep everyone on the same page with streamlined workflows.</p></li>
                       <li class="flex flex-row"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                              </svg><p>Boost Productivity: Focus on what matters with intuitive tools designed for teamwork.</p></li>
                    </ul> 
                       <li> Subscribe today and unlock the full potential of your teams!</p>
                    <a href="{{ route('subscription') }}" >
                        <input type="hidden"  >
                        <button class="bg-[#69b3e3] text-white px-4 py-2 rounded-md" type="submit">
                            {{ __('Subscribe Now') }}
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>