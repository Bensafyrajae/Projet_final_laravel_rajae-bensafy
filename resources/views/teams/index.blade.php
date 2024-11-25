<x-app-layout>
    <x-slot name="header">
        <div class="relative">
            <h1 id="teamTask" class="text-gray-900 dark:text-gray-100 text-lg relative cursor-pointer">
                {{ Auth::user()->teams->count() }} Total Teams
            </h1>
        </div>

        <div class="hidden sm:flex sm:ml-auto sm:mr-3">
            @if (Auth::user()->teams->count() < 5 || Auth::user()->hasActiveSubscription())
                <button type="button" onclick="addTeamModal.show()"
                    class="flex justify-center items-center px-3.5 py-1.5 gap-2 bg-[#69b3e3] dark:bg-gray-200 border border-transparent rounded-md font-bold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    <svg class="dark:text-gray-800 text-gray-200 size-3" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    Create Team
                </button>
                @include('teams.partials.create-modal')
            @else
                <a href="{{ route('payment.options') }}"
                    class="flex justify-center items-center px-4 py-2 bg-[#69b3e3] text-white rounded-md hover:bg-blue-400 transition">
                    Upgrade to Create More Teams
                </a>
            @endif
        </div>
    </x-slot>

    <div
        class="w-[100%] justify-center sm:px-6 lg:px-8 py-4 text-gray-900 dark:text-gray-100 flex h-fit flex-wrap gap-6">
        @forelse (Auth::user()->teams as $team)
            <div
                class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg px-6 py-4 flex-[calc(100%-1rem)] sm:flex-[calc(50%-1rem)] md:flex-[calc(33.33%-1rem)] lg:flex-[calc(25%-1rem)] flex flex-col gap-3">
                <!-- Header Section -->
                <div class="bg-gray-100 dark:bg-blue-700 p-4 rounded-md flex justify-center">
                    <span
                        class="text-xl font-bold text-white dark:text-white flex items-center justify-center h-12 w-12 rounded-full bg-[#69b3e3] dark:bg-gray-700">
                        {{ strtoupper(substr($team->name, 0, 1)) }}
                    </span>
                </div>

                <!-- Team Details -->
                <div class="mt-4 ">

                    <h5 class="font-medium  text-center  text-xl text-gray-900 dark:text-gray-100">
                        {{ $team->name }}
                    </h5>
                    <div class="flex flex-col justify-start">
                        <div class="text-sm font-light flex flex-row  text-gray-500 dark:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A4 4 0 0110 15h4a4 4 0 014.879 2.804M15 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                            <p class="mt-1"> <span class=" text-gray-700 font-bold">Member:</span>
                                {{ $team->members->count() }}{{ $team->members->count() > 1 ? 's' : '' }}</p>
                        </div>
                        <div class="text-sm font-light flex flex-row  text-gray-500 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 19l-7-7 5-5 7 7M14 7l3-3a2.121 2.121 0 113 3l-3 3M5 13l-1 6 6-1" />
                              </svg>
                            <p class="mt-1"> <span class=" text-gray-700 font-bold"> Created by :</span>
                                {{ $team->owner->name }}
                            </p>
                        </div>
                        <div class="text-sm font-light flex flex-row  dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-[#69b3e3] transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                              </svg>
                              
                        <p class="mt-1"><span class=" text-gray-700 font-bold">Number of Tasks :</span>
                            {{ $team->tasks->count() }}
                        </p>
                        </div>
                        <hr>
                    </div>

                    <!-- Footer Actions -->
                    <div class="flex justify-between items-center ">
                        <a href="{{ route('teams.show', $team) }}"
                            class="flex items-center gap-2 text-[#69b3e3] dark:text-blue-400 hover:underline">
                            <i class="fa-solid fa-chart-bar"></i> View Stats
                        </a>
                        <div class="flex gap-2">
                            <!-- Delete Team -->
                            <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 rounded-md">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg"  class="h-6 w-6 text-white bg-[#69b3e3] hover:bg-blue-400" hover:text-red-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4M9 11v6m3-6v6m3-6v6" />
                                      </svg>

                                </button>
                            </form>

                            <button type="button"
                                onclick="document.getElementById('inviteModal{{ $team->id }}').showModal()"
                                class="px-4 py-2 bg-[#69b3e3] text-white dark:bg-gray-200 dark:text-gray-800 rounded-lg shadow-md hover:shadow-lg hover:bg-[#69b3e3] transition-transform">
                                Invite Member{{ $team->id }}
                            </button>
                            <dialog id="inviteModal{{ $team->id }}">
                                <div
                                    class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                                    <div class="bg-white dark:bg-gray-800 py-6 px-8 rounded">
                                        <form action="{{ route('invites.store', $team->id) }}" method="POST">
                                            @csrf
                                            <p class="block font-medium text-lg text-gray-700 dark:text-gray-300"
                                                for="email">
                                                Create new Team!{{ $team->id }}
                                            </p>

                                            <!-- Email -->
                                            <div class="mt-6">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class='block mt-1 w-full' type="email"
                                                    name="email" required autocomplete="email" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="mt-6 flex justify-end gap-3 sm:ml-24">
                                                <x-danger-button
                                                    onclick="inviteModal{{ $team->id }}.close()">{{ __('Cancel') }}</x-danger-button>
                                                <button type="submit">create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
                            @include('teams.partials.invite-modal')



                            <!-- Edit Team -->
                            <form action="{{ route('teams.update', $team->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-4 py-2 rounded-md">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white bg-[#69b3e3] hover:bg-blue-400" transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2v-5M16.292 5.292a1 1 0 011.414 0l1.828 1.828a1 1 0 010 1.414l-9 9a1 1 0 01-.464.263l-4 1a1 1 0 01-1.263-1.263l1-4a1 1 0 01.263-.464l9-9z" />
                                      </svg>

                                </button>
                            </form>
                        </div>
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
