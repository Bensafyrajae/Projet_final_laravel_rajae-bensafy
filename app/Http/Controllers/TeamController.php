<?php


namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;
use Stripe\StripeClient;

class TeamController extends Controller
{
   

    /**
     * Display a list of teams.
     */
    public function index()
    {
        return view('teams.index');
    }

    /**
     * Show the form for creating a team.
     */
    public function create()
    {
        return view('teams.create');
    }

   
    public function store(Request $request)
{
    $user = auth()->user();


    // Check if user exceeds free team limit and doesn't have subscription
    if ($user->teams->count() >= 5 && !$user->hasActiveSubscription()) {
        return redirect()->route('payment.options')
            ->with('error', 'You need to subscribe to create more than 5 teams.');
    }

    $request->validate([
        "name" => "required|string",
        "description" => "required|string",

    ]);
   
    $team = Team::create([
        'user_id' => $user->id,
        "name" => $request->name,
        "description" => $request->description,
     
    ]);
    
    $team->members()->attach($user , ['role' => 'owner']);

    return back()->with('success', 'Team created successfully!');
}




    /**
     * Show payment options for creating additional teams.
     */
    public function showPaymentOptions()
    {
        return view('payment.options');
    }

    /**
     * Display the specified team.
     */
    public function show(Team $team)
    {
        return view('teams.show', compact('team'));
    }

    /**
     * Update the specified team.
     */
    public function update(Request $request, Team $team)
    {
        // dd($group)
        $request->validate([
            'name' => 'required|string|max:255',
        ]);


        $team->name = $request->input('name');
        $team->save();

        return back();
    }
   

    // remove 

    public function destroy(Team $team)
    {
        // Delete the specified team
        $team->delete();
    
        // Redirect back with a success message
        return back()->with('success', 'Team deleted successfully!');
    }
    

    

    /**
     * Invite a user to the team.
    //  */
    // public function invite(Request $request, Team $team)
    // {
    //     $request->validate([
    //         'email' => "required",
    //     ]);


    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->with('error', 'user with email ' . $request->email . ' not found!');
    //     }

    //     $members = $team->members->map(fn($member) => $member->id)->toArray();
    //     if (in_array($user->id, $members)) {
    //         return back()->with('error', $user->name . ' already here!');
    //     }

    //     $team->members()->attach($user);
    //     return back()->with('success', $user->name . ' invited to ' . $team->name);
    // }

    /**
     * Remove a member from the team.
     */
    public function kick(Request $request, Team $team)
    {
        // Ensure only the owner can remove members
        if (auth()->id() !== $team->owner->id) {
            return back()->with('error', 'Only the owner can remove members.');
        }

        $user = $team->members()->find($request->user_id);

        if (!$user) {
            return back()->with('error', 'User is not a member of the team.');
        }

        // Remove user from the team
        $team->members()->detach($request->user_id);

        return back()->with('success', 'Member removed successfully.');
    }

    /**
     * Store a new task in the team.
     */
    public function storeTask(Request $request)
    {
        // Validate task input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'file' => 'nullable|file|mimes:jpeg,png,pdf,docx|max:2048',
        ]);

        // Create task
        $task = Task::create([
            'team_id' => $request->team_id,
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('tasks');
            $task->file_path = $path;
            $task->save();
        }

        return back()->with('success', 'Task created successfully.');
    }



    public function SUB(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();
        $prices = Price::all();

        $checkout_session = Session::create([
            'customer' => $user->stripe_customer_id, // Use the user's Stripe customer ID
            'line_items' => [[
                'price' => $prices->data[0]->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'success_url' => route('teams.success'),
            'cancel_url' => route('dashboard'),
        ]);

        return redirect()->away($checkout_session->url);
    }
    public function paymentSuccess()
    {
        $user = User::where('id' , auth()->user()->id )->first();

        if ($user) {
            $user->stripe_status = 'active';
            $user->save();
        }

        return redirect()->route('dashboard')->with('error', 'Le paiement a échoué ou a été annulé.');
    }
}
