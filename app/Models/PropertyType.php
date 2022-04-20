<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $fillable = ['name','propertycategory_id'];

    public function property_category(){
        return $this->belongsTo('App\Models\PropertyCategory','propertycategory_id');
    }
}
