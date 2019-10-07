<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Type;
use App\Status;
use App\Company;
use App\Staff;
use App\BillingStatus;

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
        $keyword = '';
        
        list($period_start, $period_end) = Task::getThisMonth();
        
        $tasks = Task::getTasks($period_start, $period_end);

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
        $company = new Company();

        return view('tasks.create', [
            'task' => $task,
            'type' => $type,
            'status' => $status,
            'company' => $company,
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
            'company_id' => 'required',
            ]);
        
        $task = new Task();
        $task->type_id = $request->type_id;
        $task->name = $request->name;
        $task->status_id = $request->status_id;
        $task->period = $request->period;
        $task->char_counts = $request->char_counts;
        $task->note = $request->note;
        $task->company_id = $request->company_id;
        $task->staff_id = 1;
        $task->price = $request->price;
        $task->billing_status_id = 1;
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
        $billing_status = new BillingStatus();

        return view('tasks.edit', [
            'task' => $task,
            'billing_status' => $billing_status,
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
        $task->company_id = $request->company_id;
        $task->price = $request->price;
        $task->billing_status_id = $request->billing_status_id;
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
        $keyword = '';
        
        list($period_start, $period_end, $scope) = Task::calculateTerm($id);

        $tasks = Task::getTasks($period_start, $period_end);

        return view('tasks.index', [
            'tasks' => $tasks,
            'status' => $status,
            'period_start' => $period_start,
            'period_end' => $period_end,
            'keyword' => $keyword,
        ]);
    }
    

    public function staffedit($id)
    {
        $task = Task::find($id);

        return view('tasks.staffedit', [
            'task' => $task,
            ]);
    }

        public function staffupdate(Request $request, $id)
    {
        $this->validate($request, [
            'staff_id' => 'required',
        ]);
        
        $task = Task::find($id);
        $task->staff_id = $request->staff_id;
        $task->save();

        $billing_status = new BillingStatus();
        
        return view('tasks.edit', [
            'task' => $task,
            'billing_status' => $billing_status,
        ]);
    }
}
