<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)->get();

        return view('task.index', compact('tasks'));
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
    public function store(StoreTaskRequest $request)
    {
        try {

            DB::beginTransaction();

            $data               = $request->all();
            $data['user_id']    = auth()->user()->id;

            $task = Task::create($data);

            DB::commit();

            $action = 'create';

            $task->view = view('task.components.table-item', compact('task', 'action'))->render();

            return response()->json($task);

        } catch (\Throwable $th) {
            report($th);
            DB::rollback();

            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return $task;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {

            DB::beginTransaction();

            $data               = $request->all();

            if($request->status == 0){
                $data['status']    = 1;
                $data['done_date'] = now();
            }else{
                $data['status']     = 0;
                $data['done_date']  = null;
            }

            $task->fill($data)->save();

            DB::commit();

            $action = 'update';

            $task->view = view('task.components.table-item', compact('task', 'action'))->render();

            return response()->json($task);

        } catch (\Throwable $th) {
            report($th);
            DB::rollback();

            return response()->json($th->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            DB::beginTransaction();

            $task->delete();

            DB::commit();

            return response()->json($task);

        } catch (\Throwable $th) {
            report($th);
            DB::rollback();

            return response()->json($th->getMessage(), 500);
        }
    }
}
