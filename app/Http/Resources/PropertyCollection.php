<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function($data){
            return[
                'id'=>$data->id,
                'name'=>$data->name,
                'property_category'=>$data->propertycategory,
                'property_type'=>$data->propertyType?$data->propertyType->name:null,
                'feature_image'=>$this->featureImage($data->feature_image),
                'purpose'=>$data->purpose?$data->purpose->name:null,
                'property_location'=>$data->property_location,
                'total_price'=>$data->total_price,
                'kitchens'=>$data->kitchens,
                'floors'=>$data->floors,
                'bedrooms'=>$data->bedrooms,
                'bathrooms'=>$data->bathrooms,
                'shutters'=>$data->shutters,
                'living_room'=>$data->living_room,
                'room_per_floor'=>$data->room_per_floor,
                'parking'=>$data->parking,
                'garage'=>$data->garage,
                'lal_purja'=>[
                    'land_area_in_ropani_lal_purja'=>$data->land_area_in_ropani_lal,
                    'land_area_in_sqft_lal_purja'=>$data->land_area_in_sqft_lal,
                    'land_area_in_meters_lal_purja'=>$data->land_area_in_meters_lal,
                ],
                'land_according_to_measurements'=>[
                    'land_area_in_ropani_measurements'=>$data->land_area_in_ropani_mes,
                    'land_area_in_sqft_measurements'=>$data->land_area_in_sqft_mes,
                    'land_area_in_meters_measurement'=>$data->land_area_in_meters_mes,
                ],
                'property_status'=>$data->propertyStatus?$data->propertyStatus->name:null,
                'main_road_width'=>$data->main_road_width,
                'side_road_width'=>$data->side_road_width,
            ];
        });
    }
    public function featureImage($image){
        if($image){
            $image_path = asset('images/property/thumbnail/' . $image);
            return $image_path;
        }else{
            return null;
        }
    }
    public function with($request){
        return [
                'message' => 'success',
                'status' => 200,
            ];
    }

}
