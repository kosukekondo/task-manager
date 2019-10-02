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
        $period_start = \Carbon\Carbon::now()->firstOfMonth();
        $period_end = \Carbon\Carbon::now()->endOfMonth();
        
        $scope = \Carbon\Carbon::now()->firstOfMonth()->format('Y年m月');

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('company_id', 'asc')
                    ->get();

        $today = \Carbon\Carbon::now()->today();
        $border = \Carbon\Carbon::createMidnightDate(2019, 10, 1);
        if ($today >= $border) {
            $tax_rate = 0.1;
        } else {
            $tax_rate = 0.08;
        }

        $total = $tasks->sum('price');
        $tax = floor($total * $tax_rate);
        $grand_total = $total - $tax;

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
        
        $period_year = $request->input('period_year');
        $period_month = $request->input('period_month');

        $period_start = \Carbon\Carbon::createMidnightDate($period_year, $period_month, 1);
        $period_end = \Carbon\Carbon::createMidnightDate($period_year, $period_month, 1)->endOfMonth();

        $scope = $period_end->format('Y年m月');

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('company_id', 'asc')
                    ->get();
        
        $border = \Carbon\Carbon::createMidnightDate(2019, 10, 1);

        if ($period_end >= $border) {
            $tax_rate = 0.1;
        } else {
            $tax_rate = 0.08;
        }

        $total = $tasks->sum('price');
        $tax = floor($total * $tax_rate);
        $grand_total = $total - $tax;

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
        if ($id == 'lastmonth') {
            $period_start = new \Carbon\Carbon('first day of last month');
            $period_end = new \Carbon\Carbon('last day of last month'); 
        } elseif ($id == 'nextmonth') {
            $period_start = new \Carbon\Carbon('first day of next month');
            $period_end = new \Carbon\Carbon('last day of next month'); 
        } else {
            $period_start = \Carbon\Carbon::now()->firstOfMonth();
            $period_end = \Carbon\Carbon::now()->endOfMonth(); 
        }
        $scope = $period_end->format('Y年m月');

        $period_start = $period_start->toDateString();
        $period_end = $period_end->toDateString(); 

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('period', 'asc')
                    ->get();

        $border = \Carbon\Carbon::createMidnightDate(2019, 10, 1);

        if ($period_end >= $border) {
            $tax_rate = 0.1;
        } else {
            $tax_rate = 0.08;
        }

        $total = $tasks->sum('price');
        $tax = floor($total * $tax_rate);
        $grand_total = $total - $tax;

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
