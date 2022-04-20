<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['purpose_id','name','propertycategory_id','propertytype_id','property_location','country','zone','district','town','place','street','vdc_np_mnp','ward_no','location','lat','lng'];

    public function purpose(){
        return $this->belongsTo('App\Models\Purpose','purpose_id');
    }
    public function facilities(){
        return $this->belongsToMany('App\Models\Facility','property_facilities','property_id','facility_id');
    }
    public function propertyType(){
        return $this->belongsTo('App\Models\PropertyType','propertytype_id');
    }
}
