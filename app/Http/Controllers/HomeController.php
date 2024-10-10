<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks          = Task::where('user_id', auth()->user()->id)->count();
        $tasksDone      = Task::where('status', 1)->where('user_id', auth()->user()->id)->count();
        $tasksNotDone   = Task::where('status', 0)->where('user_id', auth()->user()->id)->count();

        return view('home', compact('tasksDone', 'tasksNotDone', 'tasks'));
    }
}
