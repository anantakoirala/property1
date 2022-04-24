<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $fillable = ['name'];

    public function properties(){
        return $this->belongsToMany('App\Models\Property','property_environments','environment_id','property_id');
    }
}
