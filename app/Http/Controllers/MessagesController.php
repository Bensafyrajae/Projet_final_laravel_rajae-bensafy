<?php

namespace App\Http\Controllers;

use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    /**
     * Display the messaging page
     */
    public function index()
    {
        return view('Chatify::pages.app');
    }

    /**
     * Send a message to a user or team
     */
    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'to_id' => 'required',
            'recipient_type' => 'required|in:user,team'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            if ($request->recipient_type === 'team') {
                return $this->sendTeamMessage($request);
            } else {
                return $this->sendUserMessage($request);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to send message',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Send message to an individual user
     */
    private function sendUserMessage(Request $request)
    {
        $recipient = User::findOrFail($request->to_id);
        
        // Check if users can message each other (e.g., same team or connected somehow)
        if (!$this->canMessageUser($recipient)) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to message this user'
            ], 403);
        }

        $response = Chatify::sendMessage([
            'message' => $request->message,
            'to_id' => $request->to_id,
            'type' => 'user'
        ]);

        return response()->json($response);
    }

    /**
     * Send message to a team
     */
    private function sendTeamMessage(Request $request)
    {
        $team = Team::findOrFail($request->to_id);
        
        // Check if user is allowed to message this team
        if (!$this->canMessageTeam($team)) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to message this team'
            ], 403);
        }

        // Send message to all team members
        $failedRecipients = [];
        foreach ($team->members as $member) {
            try {
                if ($member->id !== Auth::id()) {
                    Chatify::sendMessage([
                        'message' => $request->message,
                        'to_id' => $member->id,
                        'type' => 'team',
                        'team_id' => $team->id
                    ]);
                }
            } catch (\Exception $e) {
                $failedRecipients[] = $member->id;
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Team message sent',
            'failed_recipients' => $failedRecipients
        ]);
    }

    /**
     * Fetch messages for a conversation
     */
    public function fetchMessages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'to_id' => 'required',
            'type' => 'required|in:user,team'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->type === 'team') {
            $messages = Chatify::getTeamMessages($request->to_id);
        } else {
            $messages = Chatify::getMessages($request->to_id);
        }

        return response()->json($messages);
    }

    /**
     * Add conversation to favorites
     */
    public function addToFavorites(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'conversation_id' => 'required',
            'type' => 'required|in:user,team'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $response = Chatify::addFavorite($request->conversation_id, $request->type);
        return response()->json($response);
    }

    /**
     * Remove conversation from favorites
     */
    public function removeFromFavorites(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'conversation_id' => 'required',
            'type' => 'required|in:user,team'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $response = Chatify::removeFavorite($request->conversation_id, $request->type);
        return response()->json($response);
    }

    /**
     * Check if user can message another user
     */
    private function canMessageUser(User $recipient): bool
    {
        // Add your logic here to determine if users can message each other
        // For example: same team, connected users, etc.
        return true; // Replace with your actual logic
    }

    /**
     * Check if user can message a team
     */
    private function canMessageTeam(Team $team): bool
    {
        // Add your logic here to determine if user can message the team
        // For example: team member, admin, etc.
        return Auth::user()->teams->contains($team) ;
    }
}