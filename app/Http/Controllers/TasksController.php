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
        $status = 0;
        $period_start = new \Carbon\Carbon('first day of this month');
        $period_end = new \Carbon\Carbon('last day of this month'); 
        $keyword = '';

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('period', 'asc')
                    ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'status' => $status,
            'period_start' => $period_start,
            'period_end' => $period_end,
            'keyword' => $keyword,
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

    public function search(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'period_start' => 'required',
            'period_end' => 'required',
        ]);
        
        $status = $request->input('status');
        $period_start = $request->input('period_start');
        $period_end = $request->input('period_end');
        $keyword = $request->input('keyword');

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
            ->orderBy('period', 'asc');
        
        if ($status > 0) {
            $tasks = $tasks->where('status_id', $status);
        }
        
        if ($keyword) {
            $tasks = $tasks->where('name', 'like', "%{$keyword}%");
        }

        $tasks = $tasks->get();


        return view('tasks.index', [
            'tasks' => $tasks,
            'status' => $status,
            'period_start' => $period_start,
            'period_end' => $period_end,
            'keyword' => $keyword,
        ]);
    }

    public function specifiedterm($id)
    {
        $status = 0;

        if ($id == 'lastmonth') {
            $period_start = new \Carbon\Carbon('first day of last month');
            $period_end = new \Carbon\Carbon('last day of last month'); 
        } elseif ($id == 'nextmonth') {
            $period_start = new \Carbon\Carbon('first day of next month');
            $period_end = new \Carbon\Carbon('last day of next month'); 
        } elseif ($id == '7days') {
            $period_start = new \Carbon\Carbon('today');
            $period_end = new \Carbon\Carbon('7 day');
        } else {
            $period_start = new \Carbon\Carbon('first day of this month');
            $period_end = new \Carbon\Carbon('last day of this month'); 
        }

        $keyword = '';

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('period', 'asc')
                    ->get();

        return view('tasks.index', [
            'tasks' => $tasks,
            'status' => $status,
            'period_start' => $period_start,
            'period_end' => $period_end,
            'keyword' => $keyword,
        ]);
    }
}
