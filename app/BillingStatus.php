<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingStatus extends Model
{
    public function get_billing_status_list()
    {
        $billing_statuses_array = $this->select(['id', 'name'])->get()->toArray();
        
        foreach($billing_statuses_array as $status) {
            $billing_statuses_list[$status['id']] = $status['name'];
        } 
        
        return $billing_statuses_list;
    }
}
