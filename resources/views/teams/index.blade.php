<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h1 id="teamTask" class="text-gray-900 dark:text-gray-100 text-lg relative cursor-pointer">
                {{ Auth::user()->teams->count() }} Total Teams
            </h1>
        </div>

        <div class="hidden sm:flex sm:ml-auto sm:mr-3">
            @if(Auth::user()->teams->count() < 5 || Auth::user()->hasActiveSubscription())
                <button type="button" onclick="addTeamModal.show()"
                    class="flex justify-center items-center px-3.5 py-1.5 gap-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-bold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <svg class="dark:text-gray-800 text-gray-200 size-3" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Create Team
                </button>
                @include('teams.partials.create-modal')
            @else
                <a href="{{ route('payment.options') }}"
                    class="flex justify-center items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Upgrade to Create More Teams
                </a>
            @endif
        </div>
    </x-slot>

    <div class="w-[100%] justify-center sm:px-6 lg:px-8 py-4 text-gray-900 dark:text-gray-100 flex h-fit flex-wrap gap-6">
        @forelse (Auth::user()->teams as $team)
            <div
                class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg px-6 py-4 flex-[calc(100%-1rem)] sm:flex-[calc(50%-1rem)] md:flex-[calc(33.33%-1rem)] lg:flex-[calc(25%-1rem)] flex flex-col gap-3">
                <!-- Header Section -->
                <div class="bg-gray-400 dark:bg-blue-700 p-4 rounded-md flex justify-center">
                    <span
                        class="text-xl font-bold text-blue-600 dark:text-white flex items-center justify-center h-12 w-12 rounded-full bg-blue-200 dark:bg-gray-700">
                        {{ strtoupper(substr($team->name, 0, 1)) }}
                    </span>
                </div>

                <!-- Team Details -->
                <div class="mt-4 ">
                    
                        <h5 class="font-medium  text-center  text-lg text-gray-900 dark:text-gray-100">
                            {{ $team->name }}
                        </h5>
                   <div class="flex flex-col justify-start">
                    <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                       <span class=" text-gray-700 font-extralight">Member:</span>   {{ $team->members->count() }}{{ $team->members->count() > 1 ? 's' : '' }}
                    </p>
                    <p class="text-xs gap-2 text-gray-400 dark:text-gray-400">
                        <span class=" text-gray-700 font-extralight">  Created by :</span> {{ $team->owner->id == Auth::id() ? 'you' : $team->owner->name }}
                    </p>
                    <p class="text-xs text-gray-400 dark:text-gray-400"> <span class=" text-gray-700 font-extralight">Number of Tasks :</span> 
                           {{ $team->tasks->count() }}</p>
                        </div>
                    <hr>
                </div>

                <!-- Footer Actions -->
                <div class="flex justify-between items-center ">
                    <a href="{{ route('teams.show', $team) }}"
                        class="flex items-center gap-2 text-blue-500 dark:text-blue-400 hover:underline">
                        <i class="fa-solid fa-chart-bar"></i> View Stats
                    </a>
                    <div class="flex gap-2">
                        <!-- Delete Team -->
                        <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white bg-blue-500 hover:bg-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 13l3 3m0-3l-3 3m9-7h-3m0 0V4a1 1 0 00-1-1H9a1 1 0 00-1 1v2m3 0V4m0 16a9 9 0 11-9-9 9 9 0 019 9z" />
                                </svg>
                                
                            </button>
                        </form>

                        <!-- Edit Team -->
                        <form action="{{ route('teams.update', $team->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                            class="px-3 py-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white bg-blue-500 hover:bg-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-4.036-1l-8.96 8.96c-.18.18-.392.293-.633.337l-2.897.482a.75.75 0 00-.885-.885l.482-2.897a1.5 1.5 0 01.337-.633l8.96-8.96a1.5 1.5 0 012.12 0zm-2.122 4.122l-.708.708M18 12v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6" />
                                </svg>
                                
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                No Teams available.
            </div>
        @endforelse
    </div>
</x-app-layout>
