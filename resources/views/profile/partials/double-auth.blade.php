<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Double Authentication') }}
        </h2>

       
    </header>

    <form action="{{ route('double-auth.update') }}" method="post">
        @csrf
        @method('PUT')

        @if ($user->double_auth)
            <x-primary-button
                class="transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-green-700 focus:ring-2 focus:ring-green-500"
            >
                {{ __('Enable') }}
            </x-primary-button>
        @else
            <x-danger-button
                class="transition-all duration-300 ease-in-out transform hover:scale-105 hover:bg-red-700 focus:ring-2 focus:ring-red-500"
            >
                {{ __('Disable') }}
            </x-danger-button>
        @endif
    </form>
</section>
