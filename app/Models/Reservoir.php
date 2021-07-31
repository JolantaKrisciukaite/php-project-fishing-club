<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservoir extends Model
{
    use HasFactory;

    public function newMemberReservoir()
    {
        return $this->hasMany('App\Models\Outfit', 'master_id', 'id');
    }

}
