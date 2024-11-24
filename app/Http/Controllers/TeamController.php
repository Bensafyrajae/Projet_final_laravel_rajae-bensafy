<?php


namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
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
$user = $request->user();


    // Check if user exceeds free team limit and doesn't have subscription
    if ($user->teams()->count() >= 5 && !$user->hasActiveSubscription()) {
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
    
    $team->members()->attach($user);

    return back()->with('success', 'Team created successfully!');
}


    /**
     * Handle Stripe payment for additional teams.
     */
    // public function handlePayment(Request $request)
    // {
    //     $user = $request->user();
    //     $amount = $request->input('amount', 500); // Default $5 in cents

    //     // Validate payment amount
    //     if (!is_numeric($amount) || $amount <= 0) {
    //         return back()->with('error', 'Invalid payment amount.');
    //     }

    //     try {
    //         // Process the payment
    //         $this->stripe->charges->create([
    //             'amount' => $amount,
    //             'currency' => 'usd',
    //             'source' => $request->stripeToken,
    //             'description' => 'Payment for additional team',
    //             'receipt_email' => $user->email,
    //         ]);

    //         // Increment team creation limit
    //         $user->increment('teams_count');

    //         return redirect()->route('teams.create')
    //             ->with('success', 'Payment successful! You can now create an additional team.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Payment failed: ' . $e->getMessage());
    //     }
    // }

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
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        $team->update($validated);

        // Redirect back with a success message
        return redirect()->route('teams.show', $team->id)->with('success', 'Team updated successfully!');
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
     */
    public function invite(Request $request, Team $team)
    {
        $request->validate([
            'email' => "required",
        ]);


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'user with email ' . $request->email . ' not found!');
        }

        $members = $team->members->map(fn($member) => $member->id)->toArray();
        if (in_array($user->id, $members)) {
            return back()->with('error', $user->name . ' already here!');
        }

        $team->members()->attach($user);
        return back()->with('success', $user->name . ' invited to ' . $team->name);
    }

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
}
