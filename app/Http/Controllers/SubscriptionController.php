<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display subscription plans.
     */
    public function plans()
    {
        $plans = [
            [
                'name' => 'Pro Plan',
                'description' => 'Create unlimited teams',
                'price' => 999, // $9.99
                'stripe_price_id' => 'price_H5ggYwtDq4fbrJ'
            ]
        ];

        return view('subscription.plans', compact('plans'));
    }

    /**
     * Handle subscription checkout.
     */
    public function checkout(Request $request)
    {
        
        return redirect()->route('teams.index')
            ->with('success', 'Subscription feature coming soon!');
    }
    public function subscriptionSuccess()
    {

        $user = User::where('id' , auth()->user()->id )->first();

        if ($user) {
            $user->status = 'active';
            $user->save();
        } 
        return redirect()->route('teams.index')->with('success', 'Your subscription was successful!');
    }
}
