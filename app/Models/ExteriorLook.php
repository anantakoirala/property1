<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExteriorLook extends Model
{
    protected $fillable = ['name'];

    public function properties(){
        return $this->belongsToMany('App\Models\Property','property_exterior_looks','exteriorlook_id','property_id');
    }
}
