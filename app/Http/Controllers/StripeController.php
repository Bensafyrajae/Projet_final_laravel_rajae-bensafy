<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $line_items = [
            [
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Abonnement ',
                    ],
                    'unit_amount' => 50000, 
                ],
                'quantity' => 1,
            ],
        ];

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('teams') . '?success=true',
            'cancel_url' => route('dashboard') . '?success=false',
        ]);

     
        return redirect()->away($session->url);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function paymentSuccess(Request $request)
    {
       

        return redirect()->route('dashboard')->with('error', 'Le paiement a échoué ou a été annulé.');
    }

    public function paymentCancel()
    {
        return redirect()->route('dashboard')->with('error', 'Le paiement a été annulé.');
    }
}
