<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['purpose_id','name','propertycategory','class_type','advertisement_type','owner_info','property_status','propertytype_id','property_location','country','zone','district','town','place','street','vdc_np_mnp','ward_no','location','lat','lng','total_price','completion_year','url','availability_from','property_location','anna_price','sqft_price','advance','min_amount','max_amount','rent_per_month','min_lease','min_deposit','broker_response','property_highlights','property_description','other_description','kitchens','floors','bedrooms','bathrooms','shutters','living_room','room_per_floor','parking','garage','boundry','size_of_pillars','no_of_pillars','source_of_waters','capacity_of_water_tank','main_road_width','side_road_width','road_wide_facing_the_land','mohoda_facing_the_land','status_of_road','land_perimeter','land_area_in_ropani_lal','land_area_in_sqft_lal','land_area_in_meters_lal','land_area_in_ropani_mes','land_area_in_sqft_mes','land_area_in_meters_mes','geometry_of_land','elevation','finance_bank_name','loan_amount','seo','company_name','company_phone','company_address','apartment_detail','feature_image','urgency_id','user_id'];

    public function purpose(){
        return $this->belongsTo('App\Models\Purpose','purpose_id');
    }
    public function facilities(){
        return $this->belongsToMany('App\Models\Facility','property_facilities','property_id','facility_id');
    }
    public function propertyType(){
        return $this->belongsTo('App\Models\PropertyType','propertytype_id');
    }
    public function interior_looks(){
        return $this->belongsToMany('App\Models\InteriorLook','property_interior_looks','property_id','interiorlook_id');
    }
    public function exterior_looks(){
        return $this->belongsToMany('App\Models\ExteriorLook','property_exterior_looks','property_id','exteriorlook_id');
    }
    public function environments(){
        return $this->belongsToMany('App\Models\Environment','property_environments','property_id','environment_id');
    }
    public function nearbyfacilities(){
        return $this->belongsToMany('App\Models\NearByFacility','property_near_by_facilities','property_id','nearbyfacility_id');
    }
    public function images(){
        return $this->hasMany('App\Models\PropertyGallery','property_id');
    }
    public function classType(){
        return $this->belongsTo('App\Models\ClassType','class_type');
    }
    public function propertyStatus(){
        return $this->belongsTo('App\Models\PropertyStatus','property_status');
    }
}
