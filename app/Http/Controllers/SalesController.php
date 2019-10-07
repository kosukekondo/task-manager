<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        list($period_start, $period_end) = Task::getThisMonth();

        $scope = Task::getScope($period_end);

        $tasks = Task::getTasks4salles($period_start, $period_end);

        $tax_rate = Task::getTaxRate($period_start);
        
        list($total, $tax, $grand_total) = Task::getSallesResult($tasks, $tax_rate);

        return view('sales.index', [
            'tasks' => $tasks,
            'total' => $total,
            'grand_total' => $grand_total,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'scope' => $scope,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        public function search(Request $request)
    {
        $this->validate($request, [
            'period_year' => 'required',
            'period_month' => 'required',
        ]);
        
        list($period_start, $period_end) = Task::get1month($request->input('period_year'), $request->input('period_month'));
        
        $scope = Task::getScope($period_end);

        $tasks = Task::getTasks4salles($period_start, $period_end);

        $tax_rate = Task::getTaxRate($period_start);

        list($total, $tax, $grand_total) = Task::getSallesResult($tasks, $tax_rate);

        return view('sales.index', [
            'tasks' => $tasks,
            'total' => $total,
            'grand_total' => $grand_total,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'scope' => $scope,
        ]);
    }

    public function specifiedterm($id)
    {
        list($period_start, $period_end, $scope) = Task::calculateTerm($id);
        
        $tasks = Task::getTasks4salles($period_start, $period_end);

        $tax_rate = Task::getTaxRate($period_start);

        list($total, $tax, $grand_total) = Task::getSallesResult($tasks, $tax_rate);

        return view('sales.index', [
            'tasks' => $tasks,
            'total' => $total,
            'grand_total' => $grand_total,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'scope' => $scope,
        ]);
    }
}
