<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function get_type_list()
    {
        $types_array = $this->select(['id', 'name'])->get()->toArray();
        
        foreach($types_array as $type) {
            $types_list[$type['id']] = $type['name'];
        } 
        
        return $types_list;
    }
}
