<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FeaturedCollection extends ResourceCollection
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
    public static $wrap = null;

    public function featureImage($image){
        if($image){
            $image_path = asset('images/property/thumbnail/' . $image);
            return $image_path;
        }else{
            return null;
        }
    }
    public function priceCalculation($total_price){
        if((int)$total_price && $total_price != null){
            $str=strlen((string)$total_price);
            $arr=array("zero","Ones","Tens","Hundred","Thousand","Thousand","Lakh","Lakh","Crore","Crore","Arab","Arab","Kharab","Kharab");
            $ar=array(0,1,10,100,1000,1000,100000,100000,10000000,10000000,1000000000,1000000000,100000000000,100000000000);
            if(array_key_exists($str, $arr) && array_key_exists($str, $ar)){
                $y=$total_price/$ar[$str];
                return $y.' '.$arr[$str];
            }else{
                return $total_price;
            }
        }else{
            return $total_price;
        }
    }
    
}
