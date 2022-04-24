<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NearByFacility extends Model
{
    protected $fillable = ['name'];

    public function properties(){
        return $this->belongsToMany('App\Models\Property','property_near_by_facilities','nearbyfacility_id','property_id');
    }
}
