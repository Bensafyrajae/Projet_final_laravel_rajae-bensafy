<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTeamMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $recipientId = $request->route('recipient_id'); // Adjust based on your route parameter
        $recipient = \App\Models\User::find($recipientId);

        // Check if recipient exists and is in the same team as the sender
        if (!$recipient || !$user->team || $user->team->id !== $recipient->team->id) {
            return response()->json(['error' => 'You can only message members of your team.'], 403);
        }

        return $next($request);
    }
}
