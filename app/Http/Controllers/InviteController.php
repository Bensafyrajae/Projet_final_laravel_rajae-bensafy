<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invite;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
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
    public function store(Request $request ,Team $team)
    {
        //
        $request->validate([
            'email'=>'required'
        ]);




        $team = Team::where('id', $team->id)->first();

        $user = auth()->user();

        $existingMember = $team->members()->where('email', $request->email)->exists();
        if ($existingMember) {
            return back()->with('error', "you are already a member here");
        }

        $invitation = Invite::create([
            'team_id' => $team->id,
            'email' => $request->email,
            'invited_by' => $user->id,
        ]);
        Mail::to($request->email)->send(new InvitationMail($invitation));
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Invite $invite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invite $invite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invite $invite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invite $invite)
    {
        //
    }


    public function accept($id)
    {
        $invitation = Invite::where('id' , $id)->first();
       

        if ($invitation->status !== 'Pending') {
            return redirect()->route('dashboard')->with('error', 'This invitation is no longer valid.');
        }

        $user = User::firstOrCreate(['email' => $invitation->email]);

        $team = Team::where('id' , $invitation->team_id)->first();
        $team->members()->attach($user, ['role' => 'member']);

        $invitation->update(['status' => 'Accepted']);

        return redirect()->route('dashboard')->with('success' ,'You have successfully joined the team.');
    }

    public function reject($id)
    {
        $invitation = Invite::where('id', $id)->first();

        // Check if the invitation is still pending
        if ($invitation->status !== 'Pending') {
            return response()->json(['message' => 'This invitation is no longer valid.'], 400);
        }

        // Update the invitation status
        $invitation->update(['status' => 'Rejected']);

        return response()->json(['message' => 'You have rejected the invitation.']);
    }
}
