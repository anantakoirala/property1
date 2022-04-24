<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable =['name'];

    public function properties(){
        return $this->belongsToMany('App\Models\Property','property_facilities','facility_id','property_id');
    }
}
