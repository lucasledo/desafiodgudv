<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $tasksDone      = Task::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $tasksNotDone   = Task::where('status', 0)->where('user_id', auth()->user()->id)->count();

        return view('dashboard', compact('tasksDone', 'tasksNotDone'));
    }
}
