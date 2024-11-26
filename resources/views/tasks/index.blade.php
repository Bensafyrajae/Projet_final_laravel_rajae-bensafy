<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                Tasks
            </h1>

            @include('tasks.partials.create-modal')

        </div>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($statuses as $status)
                <!-- Column Header -->
                <div>
                    <div
                        class="flex justify-between items-center mb-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg px-4 py-3 shadow-md">
                        <h2 class="text-lg font-bold capitalize">
                            {{ $status }}
                        </h2>
                        <span class="bg-blue-600 text-white text-xs px-2 py-1 rounded shadow">
                            {{ $task->where('status', $status)->count() }}
                        </span>
                    </div>

                    <!-- Task Cards -->
                    <div class="space-y-4">
                        @forelse ($task->where('status', $status) as $task)
                            <div
                                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                                <h3 class="font-bold text-gray-800 dark:text-white">
                                    Task : {{ $task->title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    Description : {{ $task->description }}
                                </p>
                                <div class="mt-4 flex justify-between items-center text-sm">
                                    <p class="text-gray-500">
                                        Status: <span class="capitalize font-semibold">{{ $task->status }}</span>
                                    </p>
                                    <div class="flex gap-2">
                                        <!-- Transition Button -->
                                        @if ($task->status !== 'done')
                                            <form action="/tasks/{{ $task->id }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="status"
                                                    value="{{ $task->status === 'to do' ? 'in progress' : 'done' }}">
                                                <button
                                                    class="text-xs px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600">
                                                    Move to {{ $task->status === 'to do' ? 'In Progress' : 'Done' }}
                                                </button>
                                            </form>
                                        @endif
                                        <!-- Delete Button -->
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6 text-white bg-blue-500 hover:bg-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 13l3 3m0-3l-3 3m9-7h-3m0 0V4a1 1 0 00-1-1H9a1 1 0 00-1 1v2m3 0V4m0 16a9 9 0 11-9-9 9 9 0 019 9z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <dialog id="updateTaskModal">
                                <div class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                                    <div class="relative bg-white dark:bg-gray-800 px-6 py-8 rounded">
                                        <form method="POST" action="/tasks/{{ $task->id }}">
                                            @csrf
                                            @method('PUT')
                                            <p class="block font-medium text-lg text-gray-700 dark:text-gray-300" for="email">
                                                Update Task!
                                            </p>
            
                                            <!-- Id -->
                                            <x-input id="updateTaskId" class="hidden" name="id" required />
            
                                            <!-- Name -->
                                            <div class="mt-6">
                                                <x-input-label for="updateTaskName" :value="__('Name')" />
                                                <x-input id="updateTaskName" class="block mt-1 w-full" name="title" required />
                                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                            </div>
            
                                            <!-- Description -->
                                            <div class="mt-6">
                                                <x-input-label for="updateTaskDescription" :value="__('Description')" />
                                                <x-input id="updateTaskDescription" class="block mt-1 w-full" name="description"
                                                    required />
                                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                            </div>
            
                                            <div class="mt-6 flex flex-col sm:flex-row gap-4">
                                                <!-- Start -->
                                                <div>
                                                    <x-input-label for="updateTaskStart" :value="__('Start')" />
                                                    <x-input class="block mt-1 w-full" type="datetime-local" name="start" required
                                                        id="updateTaskStart" />
                                                    <x-input-error :messages="$errors->get('start')" class="mt-2" />
                                                </div>
            
                                                <!-- End -->
                                                <div>
                                                    <x-input-label for="updateTaskEnd" :value="__('End')" />
                                                    <x-input class="block mt-1 w-full" type="datetime-local" name="end" required
                                                        id="updateTaskEnd" />
                                                    <x-input-error :messages="$errors->get('end')" class="mt-2" />
                                                </div>
                                            </div>
            
                                            <div class="mt-4 relative">
                                                <x-input-label for="updateTaskPriority" :value="__('Priority')" />
                                                <div class="relative" onclick="updatePriorityModal.show()">
                                                    <input
                                                        class="cursor-pointer mt-1 w-full focus:outline-none border-gray-300 dark:border-gray-700 outline-none dark:bg-gray-900 text-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                                        name="priority" id="updateTaskPriority" value="low" required readonly />
                                                    <svg class="cursor-pointer absolute bottom-1/2 translate-y-1/2 -translate-x-1/2 right-0 text-gray-900 dark:text-gray-300 size-5 fill-current"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
            
                                                <dialog class="m-0 w-full bg-transparent" id="updatePriorityModal">
                                                    <div
                                                        class="mt-1 border border-gray-300 dark:border-gray-700 text-gray-900 bg-white dark:bg-gray-800 dark:text-gray-300 rounded-md shadow-sm">
                                                        @foreach (['low', 'medium', 'high', 'critical'] as $priority)
                                                            <div onclick="updateTaskPriority.value = '{{ $priority }}'; updatePriorityModal.close()"
                                                                class="border-t px-6 py-2 cursor-pointer">{{ $priority }}</div>
                                                        @endforeach
                                                    </div>
                                                </dialog>
                                                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                                            </div>
            
                                            <div class="mt-6 flex justify-end gap-3">
                                                <x-danger-button type="button"
                                                    onclick="updateTaskModal.close()">{{ __('Cancel') }}</x-danger-button>
                                                <x-primary-button>{{ __('Update Task') }}</x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </dialog>
                        @empty
                            <p
                                class="text-gray-500 dark:text-gray-400 text-center bg-gray-100 dark:bg-gray-700 py-2 rounded">
                                No tasks in this status.
                            </p>
                        @endforelse
                    </div>
                </div>

 
            @endforeach
        </div>
    </div>

    <!-- Include Task Modals -->

    @include('tasks.partials.update-modal')
</x-app-layout>
