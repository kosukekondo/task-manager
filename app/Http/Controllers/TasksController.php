<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Type;
use App\Status;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasks = Task::all();
        $tasks = Task::orderBy('period', 'asc')->get();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        $type = new Type();
        $status = new Status();

        return view('tasks.create', [
            'task' => $task,
            'type' => $type,
            'status' => $status,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_id' => 'required',
            'name' => 'required|max:191',
            'status_id' => 'required',
            'period' => 'required',
            'note' => 'max:191',
            ]);
        
        $task = new Task();
        $task->type_id = $request->type_id;
        $task->name = $request->name;
        $task->status_id = $request->status_id;
        $task->period = $request->period;
        $task->char_counts = $request->char_counts;
        $task->note = $request->note;
        $task->save();
        
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type_id' => 'required',
            'name' => 'required|max:191',
            'status_id' => 'required',
            'period' => 'required',
            'note' => 'max:191',
            ]);
        
        $task = Task::find($id);
        $task->type_id = $request->type_id;
        $task->name = $request->name;
        $task->status_id = $request->status_id;
        $task->period = $request->period;
        $task->char_counts = $request->char_counts;
        $task->note = $request->note;
        $task->save();
        
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        return redirect('tasks');
    }

    public function duplicate($id){
        $task = Task::find($id)->replicate();
        $task->name = $task->name . ' #コピー';
        unset($task->created_at);
        unset($task->updated_at);
        $task->save();

        return redirect('tasks');
    }
}
