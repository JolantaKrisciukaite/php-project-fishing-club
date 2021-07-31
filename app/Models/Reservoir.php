<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    use HasFactory;

    public function newMemberReservoir()
    {
        return $this->belongsTo('App\Models\Member', 'member_id', 'id');
    }

}
