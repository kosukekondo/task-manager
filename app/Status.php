<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function get_status_list()
    {
        $statuses_array = $this->select(['id', 'name'])->get()->toArray();
        
        foreach($statuses_array as $status) {
            $statuses_list[$status['id']] = $status['name'];
        } 
        
        return $statuses_list;
    }
}
