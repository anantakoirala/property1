<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FacilityResource;
use App\Http\Resources\NearByFacilityResource;
use App\Http\Resources\EnvironmentResource;
use App\Http\Resources\GalleryResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'property_category'=>$this->propertycategory,
            'class_type'=>$this->classType->name,
            'feature_image'=>$this->featureImage($this->feature_image),
            'owner_info'=>$this->owner_info,
            'property_status'=>$this->propertyStatus->name,
            'property_type'=>$this->propertyType->name,
            'property_location'=>$this->property_location,
            'country'=>$this->country,
            'zone'=>$this->zone,
            'district'=>$this->district,
            'town'=>$this->town,
            'place'=>$this->place,
            'street'=>$this->street,
            'vdc_np_mnp'=>$this->vdc_np_mnp,
            'ward_no'=>$this->ward_no,
            'location'=>$this->location,
            'latitude'=>$this->lat,
            'longitude'=>$this->lng,
            'total_price'=>$this->total_price,
            'lal_purja'=>[
                'land_area_in_ropani_lal_purja'=>$this->land_area_in_ropani_lal,
                'land_area_in_sqft_lal_purja'=>$this->land_area_in_sqft_lal,
                'land_area_in_meters_lal_purja'=>$this->land_area_in_meters_lal,
            ],
            'land_according_to_measurements'=>[
                'land_area_in_ropani_measurements'=>$this->land_area_in_ropani_mes,
                'land_area_in_sqft_measurements'=>$this->land_area_in_sqft_mes,
                'land_area_in_meters_measurement'=>$this->land_area_in_meters_mes,
            ],
            'rent_per_month'=>$this->rent_per_month,
            'property_highlights'=>$this->property_highlights,
            'other_description'=>$this->other_description,
            'main_road_width'=>$this->main_road_width,
            'side_road_width'=>$this->side_road_width,
            'road_wide_facing_the_land'=>$this->road_wide_facing_the_land,
            'mohoda_facing_the_land'=>$this->mohoda_facing_the_land,
            'status_of_road'=>$this->status_of_road,
            'geometry_of_land'=>$this->geometry_of_land,
            'land_perimeter'=>$this->land_perimeter,
            'elevation'=>$this->elevation,
            'advance'=>$this->advance,
            
            'rent_per_month'=>$this->rent_per_month,
            
            'min_deposit'=>$this->min_deposit,
            'negotiability_min_amount'=>$this->min_amount,
            'negotiability_max_amount'=>$this->max_amount,
            'kitchens'=>$this->kitchens,
            'floors'=>$this->floors,
            'bedrooms'=>$this->bedrooms,
            'bathrooms'=>$this->bathrooms,
            'shutters'=>$this->shutters,
            'living_room'=>$this->living_room,
            'room_per_floor'=>$this->room_per_floor,
            'parking'=>$this->parking,
            'garage'=>$this->garage,
            'source_of_waters'=>$this->source_of_waters,
            'capacity_of_water_tank'=>$this->capacity_of_water_tank,
            'size_of_pillars'=>$this->size_of_pillars,
            'no_of_pillars'=>$this->no_of_pillars,
            'finance_bank_name'=>$this->finance_bank_name,
            'loan_amount'=>$this->loan_amount,
            'facilities'=>FacilityResource::collection($this->whenLoaded('facilities')),
            'nearbyfacilities'=>NearByFacilityResource::collection($this->whenLoaded('nearbyfacilities')),
            'environments'=>EnvironmentResource::collection($this->whenLoaded('environments')),
            
            // 'urgency'=>'',
            // 'min_lease_period'=>'' 



        ];
    }
    public function featureImage($image){
        if($image){
            $image_path = asset('images/property/thumbnail/' . $image);
        }else{
            return null;
        }
    }
}
