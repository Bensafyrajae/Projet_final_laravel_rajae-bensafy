<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Options') }}
        </h2>
    </x-slot>

    <div class=" py-12 mx-auto w-full max-w-lg p-6 space-y-6  bg-white dark:bg-gray-800 shadow  rounded-lg">
        <p class="flex justify-center  text-gray-600 dark:text-gray-400 mb-4">
            You have reached the maximum limit of 5 teams. Please choose one of the options below to continue:
        </p>

        <div class=" flex justify-center gap-4">
            <!-- One-Time Payment Form -->
            <form id="payment-form" action="{{ route('payment.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="stripeToken" id="stripeToken">
                <input type="hidden" name="amount" value="500"> <!-- $5 in cents -->
               <form action="{{ route('teams.request') }}"
                method="POST">
                @csrf
                 <button type="submit">
                    Pay $5 for One Additional Team
                </button>
            </form>
            </form>

        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}'); // Use the publishable key

        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', async (e) => {
            e.preventDefault();

            // Create a Stripe token
            const { error, token } = await stripe.createToken('card');
            if (error) {
                alert(error.message);
                return;
            }

            // Add the token to the form and submit
            document.getElementById('stripeToken').value = token.id;
            document.getElementById('payment-form').submit();
        });
    </script>
</x-app-layout>
 