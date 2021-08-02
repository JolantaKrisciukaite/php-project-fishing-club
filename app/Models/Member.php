<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    public function memberReservoir()
    {
        return $this->belongsTo('App\Models\Reservoir', 'reservoir_id', 'id');
    }
}
