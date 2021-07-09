<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    public function store(Request $request)
    {
        $task = Task::create([
            'content' => $request->input('task', '')
        ]);


        if($task){
            return response()->json([
                'message' => 'Task added successfully',
                'status' => 200
            ]);
        }
    }

}
