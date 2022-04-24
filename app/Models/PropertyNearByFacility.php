<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyNearByFacility extends Model
{
    protected $fillable =['property_id','nearbyfacility_id'];
}
