<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('welcome', ['tasks' => $tasks]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->back()->with('message', 'Task Deleted Successfully');
    }
}
