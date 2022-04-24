<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GalleryImageResource extends JsonResource
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
            'image'=>$this->image($this->filename),
        ];
    }
    public function image($image){
        if($image){

            $image_path = asset('images/property/main/' . $image);
            return $image_path;
        }else{
            return null;
        }
    }
}
