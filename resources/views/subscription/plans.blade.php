<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subscription Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid gap-6 md:grid-cols-2">
                        @foreach ($plans as $plan)
                            <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-2">{{ $plan['name'] }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $plan['description'] }}</p>
                                <p class="text-2xl font-bold mb-4">${{ number_format($plan['price'] / 100, 2) }}/month</p>
                                <form action="{{ route('teams.request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="price_id" value="{{ $plan['stripe_price_id'] }}">
                                    <x-primary-button type="submit">
                                        {{ __('Subscribe Now') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>