<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteriorLook extends Model
{
    protected $fillable = ['name'];
    
    public function properties(){
        return $this->belongsToMany('App\Models\Property','property_interior_looks','interiorlook_id','property_id');
    }
}
