<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Invoice;
use App\Staff;
use Illuminate\Support\Facades\DB;
use PDF;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        list($period_start, $period_end) = Task::getThisMonth();

        $staff_array = Task::getStaffArray($period_start, $period_end);
        $invoices = Invoice::getInvoiceArray($staff_array, $period_start, $period_end);

        $scope = Task::getScope($period_end);

        return view('invoices.index', [
            'invoices' => $invoices,
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
    public function edit(Request $request)
    {
        list($period_start, $period_end) = Task::get1month($request->year, $request->month);
    
        $staff_array = Invoice::getStaffId4edit($request->staff_id);

        $invoices = Invoice::getInvoiceArray($staff_array, $period_start, $period_end);

        $tasks = Task::getTasks4invoice($period_start, $period_end, $request->staff_id);
        $tax_rate = Task::getTaxRate($period_start);
        list($total, $tax, $grand_total) = Invoice::getAmount4invoice($tasks, $tax_rate);

        return view('invoices.edit', [
            'invoices' => $invoices,
            'tasks' => $tasks,
            'tax_rate' => $tax_rate,
            'total' => $total,
            'tax' => $tax,
            'grand_total' => $grand_total,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'period_year' => 'required',
            'period_month' => 'required',
        ]);

        list($period_start, $period_end) = Task::get1month($request->input('period_year'), $request->input('period_month'));

        $staff_array = Task::getStaffArray($period_start, $period_end);
        $invoices = Invoice::getInvoiceArray($staff_array, $period_start, $period_end);

        $scope = Task::getScope($period_end);

        return view('invoices.index', [
            'invoices' => $invoices,
            'scope' => $scope,
        ]);
    }

    public function specifiedterm($id)
    {
        list($period_start, $period_end, $scope) = Task::calculateTerm($id);

        $staff_array = Task::getStaffArray($period_start, $period_end);
        $invoices = Invoice::getInvoiceArray($staff_array, $period_start, $period_end);

        return view('invoices.index', [
            'invoices' => $invoices,
            'scope' => $scope,
        ]);
    }

    public function bsupdate(Request $request)
    {
        list($period_start, $period_end) = Task::get1month($request->year, $request->month);
        
        $tasks = Task::getTasks4invoice($period_start, $period_end, $request->staff_id);
        
        $billing_id = $request->id;
        

        foreach ($tasks as $task) {
            $task->billing_status_id = 2;
            $task->billing_id = $billing_id;
            $task->save();
        }

        return redirect('invoices');
    }

    public function generatepdf(Request $request)
    {
        list($period_start, $period_end) = Task::get1month($request->year, $request->month);

        $staff_array = Invoice::getStaffId4edit($request->staff_id);

        $invoices = Invoice::getInvoiceArray($staff_array, $period_start, $period_end);

        $tasks = Task::getTasks4invoice($period_start, $period_end, $request->staff_id);
        $tax_rate = Task::getTaxRate($period_start);
        list($total, $tax, $grand_total) = Invoice::getAmount4invoice($tasks, $tax_rate);

    	$pdf = PDF::loadView('invoices.pdf', [
    	    'period_end' => $period_end,
            'invoices' => $invoices,
            'tasks' => $tasks,
            'tax_rate' => $tax_rate,
            'total' => $total,
            'tax' => $tax,
            'grand_total' => $grand_total,
	    ]);

    	return $pdf->download("{$request->id}" . '.pdf');
    }

}