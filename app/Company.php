<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function get_company_list()
    {
        $companies_array = $this->select(['id', 'name'])->get()->toArray();
        
        foreach($companies_array as $company) {
            $companies_list[$company['id']] = $company['name'];
        } 
        
        return $companies_list;
    }
}
