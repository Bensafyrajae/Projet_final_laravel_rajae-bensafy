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
    public function store(Request $request, $id)
    {
        $model = [
        "User" => User::class,
        "Team" => Team::class,
        ][$request->input('type')]::find($id);

        $request->validate([
            "title" => "required|string",
            "description" => "required|string",
            "priority" => "required|string",
            "start" => "required",
            "end" => "required",
        ]);

        $model->tasks()->create([
            "title" => $request->title,
            "description" => $request->description,
            "priority" => $request->priority,
            "start" => $request->start,
            "end" => $request->end,
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
  

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id = null)
    {   
        $request->validate([
            "id" => "integer",
            "title" => "string",
            "description" => "string",
            "priority" => "string",
        ]);
        $request->update([
            "id" => "integer",
            "title" => "string",
            "description" => "string",
            "priority" => "string",
        ]);

       

        return redirect()->back()->with('info', 'Personal task updated successfully!');;
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
