<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RentPropertyCollection extends ResourceCollection
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
            return [
                'id'=>$data->id,
                'property_name'=>$data->name,
                'purpose'=>$data->purpose->name,
                'class_type'=>$data->classType?$data->classType->name:null,
                'property_category'=>$data->propertycategory,
                'feature_image'=>$this->featureImage($data->feature_image),
                'total_price'=>$this->priceCalculation($data->total_price),
                'property_category'=>$data->propertycategory,
                'property_location'=>$data->property_location,
                'land_area_in_sqft_according_to_lal_purja'=>$data->land_area_in_sqft_lal,
                'land_price_per_anna'=>$data->anna_price,
                'bathrooms'=>$data->bathrooms,
                'kitchens'=>$data->kitchens,
                'floors'=>$data->floors,
                'bedrooms'=>$data->bedrooms,
                'shutters'=>$data->shutters,
                'living_room'=>$data->living_room,
                'room_per_floor'=>$data->room_per_floor,
                'property_highlights'=>$data->property_highlights,
                'property_description'=>$data->property_description,
                'other_description'=>$data->other_description,
            ];
        });
    }
    public function featureImage($image){
        if($image){
            $image_path = asset('images/property/thumbnail/' . $image);
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
    public function with($request){
        return [
                'message' => 'success',
                'status' => 200,
            ];
    }
}
