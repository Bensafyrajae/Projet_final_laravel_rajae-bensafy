<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-8">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
               Tasks
            </h1>
            <form action="" method="POST" class="ml-auto">
                @csrf
                <button type="submit" onclick="addTaskModal.show()"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-700 transition-transform">
                    Create Task
                </button>
            </form>
            @include('tasks.partials.create-modal')

        </div>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($statuses as $status)
                <!-- Column Header -->
                <div>
                    <div class="flex justify-between items-center mb-4 bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg px-4 py-3 shadow-md">
                        <h2 class="text-lg font-bold capitalize">
                            {{ $status }}
                        </h2>
                        <span
                            class="bg-blue-600 text-white text-xs px-2 py-1 rounded shadow">
                            {{ $task->where('status', $status)->count() }}
                        </span>
                    </div>

                    <!-- Task Cards -->
                    <div class="space-y-4">
                        @forelse ($task->where('status', $status) as $task)
                            <div
                                class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                                <h3 class="font-bold text-gray-800 dark:text-white">
                                 Task :   {{ $task->title }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                    Description :    {{ $task->description }}
                                </p>
                                <div class="mt-4 flex justify-between items-center text-sm">
                                    <p class="text-gray-500">
                                        Status: <span class="capitalize font-semibold">{{ $task->status }}</span>
                                    </p>
                                    <div class="flex gap-2">
                                        <!-- Transition Button -->
                                        @if ($task->status !== 'done')
                                            <form action="{{ route('tasks.update', $task->id) }}" method="POST"
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
                                            <button type="submit"
                                            class="px-3 py-1 rounded-full">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white bg-blue-500 hover:bg-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 13l3 3m0-3l-3 3m9-7h-3m0 0V4a1 1 0 00-1-1H9a1 1 0 00-1 1v2m3 0V4m0 16a9 9 0 11-9-9 9 9 0 019 9z" />
                                            </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 dark:text-gray-400 text-center bg-gray-100 dark:bg-gray-700 py-2 rounded">
                                No tasks in this status.
                            </p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Include Task Modals -->
    @include('tasks.partials.create-modal')
    @include('tasks.partials.update-modal')
</x-app-layout>
