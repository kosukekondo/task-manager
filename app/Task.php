<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

        public function company()
    {
        return $this->belongsTo(Company::class);
    }

        public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    

    public static function getTasks($period_start, $period_end) {
        $tasdks = array();

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('period', 'asc')
                    ->get();

        return $tasks;
    }

    public static function getThisMonth() {
        $period_start = \Carbon\Carbon::now()->firstOfMonth();
        $period_end = \Carbon\Carbon::now()->endOfMonth(); 

        return array($period_start, $period_end);
    }

    public static function get1month($period_year, $period_month) {
        $period_start = \Carbon\Carbon::createMidnightDate($period_year, $period_month, 1);
        $period_end = \Carbon\Carbon::createMidnightDate($period_year, $period_month, 1)->endOfMonth();
        
        return array($period_start, $period_end);
    }

    public static function calculateTerm($id) {
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
            $period_start = \Carbon\Carbon::now()->firstOfMonth();
            $period_end = \Carbon\Carbon::now()->endOfMonth(); 
        }
        $scope = Task::getScope($period_end);

        $period_start = $period_start->toDateString();
        $period_end = $period_end->toDateString(); 
        
        return array($period_start, $period_end, $scope);
    }

    
    public static function getScope($period_end) {
        $scope = $period_end->format('Y年m月');
        
        return $scope;
    }

    
    
    public static function getTasks4salles($period_start, $period_end) {
        $tasdks = array();

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->orderBy('company_id', 'asc')
                    ->get();

        return $tasks;
    }

    public static function getTaxRate($period_start) {
        $border = \Carbon\Carbon::createMidnightDate(2019, 10, 1);
        
        if ($period_start >= $border) {
            $tax_rate = 0.1;
        } else {
            $tax_rate = 0.08;
        }
        
        return $tax_rate;
    }

    public static function getSallesResult($tasks, $tax_rate) {
        $total = $tasks->sum('price');
        $tax = floor($total * $tax_rate);
        $grand_total = $total - $tax;
        
        return array($total, $tax, $grand_total);
    }

    
    public static function getStaffArray($period_start, $period_end) {
        $staff_array = DB::table('tasks')
                        ->select('staff_id')
                        ->whereBetween('period', [$period_start, $period_end])
                        ->groupBy('staff_id')
                        ->get()
                        ->toArray();

        return $staff_array;            
    }
    

    public static function getTasks4invoice($period_start, $period_end, $staff_id) {
        $tasdks = array();

        $tasks = Task::whereBetween('period', [$period_start, $period_end])
                    ->where('staff_id', $staff_id)
                    ->orderBy('period', 'asc')
                    ->get();

        return $tasks;
    }
}
