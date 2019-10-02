<?php

namespace App;

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
}
