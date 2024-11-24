<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 transition-transform hover:scale-105">
                Team Dashboard: {{ $team->name }}
            </h1>
            <div class="flex gap-4">
                <button type="button" onclick="document.getElementById('inviteModal').showModal()"
                    class="px-4 py-2 bg-blue-500 text-white dark:bg-gray-200 dark:text-gray-800 rounded-lg shadow-md hover:shadow-lg hover:bg-blue-600 transition-transform">
                    Invite Member
                </button>
                @include('teams.partials.invite-modal')

                <button type="button"
                    onclick="taskStart.value = formatDateTime(new Date());taskEnd.value = formatDateTime(new Date());addTaskModal.show()"
                    class="px-4 py-2 bg-blue-500 text-white dark:bg-gray-200 dark:text-gray-800 rounded-lg shadow-md hover:shadow-lg hover:bg-blue-600 transition-transform">
                    Add Task
                </button>
                @include('tasks.partials.create-modal', $data = ['id' => $team->id, 'type' => 'Team'])
            </div>
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
                                <td class="py-3 px-4">{{ $task->title }}</td>
                            
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
        <div class="">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h2 class="text-lg font-bold text-gray-800 dark:text-gray-200">Calendar</h2>
                <div id="calendar" class="mt-4 animate-pulse"></div>
                @include('tasks.partials.create-modal', $data)
            @include('tasks.partials.update-modal') 
            </div>
        </div>
    </div>
</x-app-layout>
@vite('resources/js/calender.js')

