<?php

namespace App;

use Illuminate\Support\Facades\DB;
use App\Staff;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public static function getInvoiceArray($staff_array, $period_start, $period_end)
    {
        $invoices = array();

        for ($i = 0; $i < count($staff_array); $i++) {
            $invoices[$i]['company_name'] = Staff::find($staff_array[$i]->staff_id)->company->name;
            $invoices[$i]['staff_name'] = Staff::find($staff_array[$i]->staff_id)->name;
            $invoices[$i]['task_num'] = DB::table('tasks')->where('staff_id', $staff_array[$i]->staff_id)->whereBetween('period', [$period_start, $period_end])->count();
            $invoices[$i]['finished_task_num'] = DB::table('tasks')->where('staff_id', $staff_array[$i]->staff_id)->where('status_id', 2)->whereBetween('period', [$period_start, $period_end])->count();
            $invoices[$i]['billing_finished_num'] = DB::table('tasks')->where('staff_id', $staff_array[$i]->staff_id)->where('billing_status_id', 2)->whereBetween('period', [$period_start, $period_end])->count();
            $invoices[$i]['link_id'] = $period_end->format('Y') . "_" . $period_end->format('m') . "_" . Staff::find($staff_array[$i]->staff_id)->company_id . "_" . Staff::find($staff_array[$i]->staff_id)->id;
            $invoices[$i]['year'] = $period_end->format('Y');
            $invoices[$i]['month'] = $period_end->format('m');
            $invoices[$i]['company_id'] = Staff::find($staff_array[$i]->staff_id)->company_id;
            $invoices[$i]['staff_id'] = Staff::find($staff_array[$i]->staff_id)->id;
        }

        return $invoices;
    }

    public static function getStaffId4edit($staff_id) {
        $staff_array = DB::table('tasks')
                    ->select('staff_id')
                    ->where('staff_id', $staff_id)
                    ->get()
                    ->toArray();

        return $staff_array;
    }

    public static function getAmount4invoice($tasks, $tax_rate) {
        $total = $tasks->sum('price');
        $tax = floor($total * $tax_rate);
        $grand_total = $total + $tax;
        
        return array($total, $tax, $grand_total);
    }    
}
