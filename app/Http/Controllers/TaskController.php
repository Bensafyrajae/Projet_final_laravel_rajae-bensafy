<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $task=Task::all();
        return view('tasks.index', compact('task'));
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
        //
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'priority' => 'required',
            'start' => 'required',
            'end' => 'required',
            'team_id' => 'nullable',
        ]);





        $teamId = $request->team_id;
        $user = auth()->user();

        if ($teamId) {
            $teams = Team::where('id', $teamId)->first();
        }

        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'start' => $request->start,
            'end' => $request->end,
            'creator_id' => $user->id,
            'team_id' => $teamId,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        $task=Task::all();
        return view('tasks.index', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
  
     public function edit($id)
     {
         $task = Task::findOrFail($id); // Retrieve the task by ID or throw a 404 if not found
         return view('tasks.edit', compact('task'));
     }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id = null)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            "id" => "integer|nullable",
            "title" => "string|nullable",
            "description" => "string|nullable",
            "priority" => "string|nullable",
            "status" => "string|nullable",
            "start" => "date|nullable",
            "end" => "date|nullable",
        ]);
    
        // Find the task using the provided id or the id from the request
        $task = Task::find($id ?? $request->id);
    
        if (!$task) {
            return redirect()->back()->with('error', 'Task not found.');
        }
    
        // Update the task with the validated data
        $task->update($validatedData);
    
        return redirect()->back()->with('info', 'Task updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            // Delete the task
            $task->delete();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Task deleted successfully.');
        } catch (\Exception $e) {
            // Handle any errors
            return redirect()->back()->with('error', 'An error occurred while deleting the task.');
        }
    }
    

    public function all(Request $request, string $id = null) {
        $backgroundColors = [
            'to do' => '#0855b1',
            'in progress' => '#6497b1',
            'done' => '#b3cde0',
        ];

        $tasks = [];
        $team = Team::find($id);
        foreach ($team ? $team->tasks : $request->user()->tasks as $task) {
            $tasks[] = [
                ...$task->toArray(),
                "backgroundColor" => $backgroundColors[$task->status],
            ];
        }

        return response()->json([
            "events" => $tasks
        ]);
    }
    
}
