<x-app-layout>
    <x-slot name="header">
      <div class="flex justify-between items-center gap-8"> <!-- Increased gap -->
    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 transition-transform hover:scale-105">
        Team Dashboard: {{ $team->name }}
    </h1>

    <button onclick="toggleModal('modaletasks', true)"
    class="bg-blue-600 font-bold text-white px-3 py-2 rounded-md text-sm hover:bg-blue-500 transition">
    + Create Task
</button>

<!-- Modal -->

<div id="modaletasks" class="fixed hidden z-50 inset-0 flex  items-center justify-center bg-white bg-opacity-80"
    aria-hidden="true" role="dialog">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-8 relative text-gray-200">
        <!-- Close Button -->
        <button
            class="absolute top-4 right-4 text-blue- hover:text-gray-300 focus:ring-2 focus:ring-gray-500 focus:outline-none"
            aria-label="Close Modal" onclick="toggleModal('modaletasks', false)">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Modal Heading -->
        <h2 class="text-2xl font-bold text-center text-blue-400 mb-6">Create a New Task</h2>

        <!-- Form for Creating a Task -->
        <form action='/tasks/store' method="post">
            @csrf

            <!-- Task Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-400 mb-1">Task Name</label>
                >
                <input type="text" name="name" id="name"
                    class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                    placeholder="Enter task name" required value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-400 mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                    placeholder="Enter task description">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deadline -->
            <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Date Start -->
                <div>
                    <label for="start" class="block text-sm font-medium text-gray-400 mb-1">Date Start</label>
                    <input type="datetime-local" id="start" name="start" min="{{ date('Y-m-d\TH:i') }}"
                        class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                        required>
                    @error('start')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date End -->
                <div>
                    <label for="end" class="block text-sm font-medium text-gray-400 mb-1">Date End</label>
                    <input type="datetime-local" id="end" name="end" min="{{ date('Y-m-d\TH:i') }}"
                        class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400"
                        required>
                    @error('end')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-400 mb-1">Status</label>
                <select name="status" id="status"
                    class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                    <option value="to do" {{ old('status') == 'to do' ? 'selected' : '' }}>To Do</option>
                    <option value="in progress" {{ old('status') == 'in progress' ? 'selected' : '' }}>In Progress
                    </option>
                    <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>



            <!-- Priority -->
            <div class="mb-4">
                <label for="priority" class="block text-sm font-medium text-gray-400 mb-1">Priority</label>
                <select name="priority" id="priority"
                    class="w-full px-4 py-3 border border-gray-600 bg-white text-black rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400">
                    <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                </select>
                @error('priority')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <button type="button" onclick="toggleModal('modaletasks', false)"
                    class="text-gray-300 bg-blue-600 hover:bg-gray-600 px-5 py-2 rounded-lg shadow transition">
                    Cancel
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white font-bold rounded-lg shadow hover:bg-blue-500 transition">
                    Create Task
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (show) {
            modal.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
            modal.setAttribute('aria-hidden', 'false');
        } else {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            modal.setAttribute('aria-hidden', 'true');
        }
    }

    // Close modal on ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            const modal = document.querySelector('.fixed:not(.hidden)');
            if (modal) toggleModal(modal.id, false);
        }
    });
</script>
</div>

    </x-slot>

    <div class="px-6 py-4 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Team Details Table -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h6 class="text-lg font-bold text-blue-500 mb-4">Team Details</h6>
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm">
                            <th class="py-3 px-4">Property</th>
                            <th class="py-3 px-4">Details</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-400 text-sm">
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-4 font-medium">Created By</td>
                            <td class="py-3 px-4">{{ $team->owner->name }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <td class="py-3 px-4 font-medium">Description</td>
                            <td class="py-3 px-4">{{ $team->description }}</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 font-medium">Number of Tasks</td>
                            <td class="py-3 px-4">{{ $team->tasks->count() }}</td>
                        </tr>
                        <tr>
                           <td class="py-3 px-4 font-medium">Members</td>
                           <td> @foreach ($team->members as $member)
                            @if ($team->owner->id != $member->id)
                                <p class="ml-2 text-gray-900 dark:text-gray-400">{{ $member->name }}</p>
                              
                            @endif
                        @endforeach
                    </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <h6 class="text-lg font-bold text-blue-500 mb-4">Tasks</h6>
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm">
                            <th class="py-3 px-4">Task Name</th>
                            
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-400 text-sm">
                        @foreach ($team->tasks as $task)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="py-3 px-4">{{ $task->name }}</td>
                            
                                <td class="py-3 px-4">
                                    <span
                                        class="px-2 py-1 rounded-lg text-sm {{ $task->status === 'to do' ? 'bg-gray-200 text-gray-800' : ($task->status === 'in progress' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800') }}">
                                        {{ ucfirst($task->status) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 flex gap-2 justify-center">
                                    <!-- Transition from 'to do' to 'in progress' -->
                                    @if ($task->status === 'to do')
                                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="in progress">
                                            <button class="px-2 py-1 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600 transition-transform">
                                                Start
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Transition from 'in progress' to 'done' -->
                                    @if ($task->status === 'in progress')
                                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="done">
                                            <button class="px-2 py-1 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600 transition-transform">
                                                Complete
                                            </button>
                                        </form>
                                    @endif

                                    <!-- Delete Task -->
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-1 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600 transition-transform">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-[74vw]">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Calendar</h2>
                <div id="calendar" class="mt-4 animate-pulse"></div>
                @vite('resources/js/calender.js')
            </div>
        </div>
    </div>
    </div>
</x-app-layout>


