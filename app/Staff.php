<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function get_staff_list($id)
    {
        $staff_array = $this->select(['id', 'name'])->where('company_id', $id)->get()->toArray();
        
        foreach($staff_array as $staff) {
            $staff_list[$staff['id']] = $staff['name'];
        } 
        
        return $staff_list;
    }
    
}
