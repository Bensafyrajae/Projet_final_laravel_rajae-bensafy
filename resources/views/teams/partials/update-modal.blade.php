<dialog id="updateTeamModal" class="fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
    <div class="bg-white dark:bg-gray-800 px-8 py-6 rounded shadow-lg w-[90%] max-w-lg">
        <form id="updateTeamForm" method="POST">
            @csrf
            @method('PUT')
            <p class="block font-medium text-lg text-gray-700 dark:text-gray-300 mb-4">
                Update Team
            </p>

            <!-- Team Name -->
            <div class="mt-6">
                <x-input-label for="teamName" :value="__('Name')" />
                <x-input id="teamName" class="block mt-1 w-full" name="name" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Team Description -->
            <div class="mt-6">
                <x-input-label for="teamDescription" :value="__('Description')" />
                <x-input id="teamDescription" class="block mt-1 w-full" name="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Actions -->
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600"
                    onclick="document.getElementById('updateTeamModal').close()">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</dialog>

<script>
    function openUpdateModal(teamId, teamName, teamDescription) {
        const modal = document.getElementById('updateTeamModal');
        const form = document.getElementById('updateTeamForm');
        const nameInput = document.getElementById('teamName');
        const descriptionInput = document.getElementById('teamDescription');

        // Set form action
        form.action = `/teams/${teamId}`;
        
        // Set current values
        nameInput.value = teamName;
        descriptionInput.value = teamDescription || '';

        // Show modal
        modal.showModal();
    }
</script>