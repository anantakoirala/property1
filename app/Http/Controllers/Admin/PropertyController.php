<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Property\PropertyRepository;
use App\Repositories\Purpose\PurposeRepository;
use App\Repositories\PropertyCategory\PropertyCategoryRepository;
use App\Repositories\PropertyFacility\PropertyFacilityRepository;
use App\Repositories\Facility\FacilityRepository;
use App\Repositories\PropertyType\PropertyTypeRepository;
use App\Repositories\ClassType\ClassTypeRepository;
use App\Repositories\AdvertisementType\AdvertisementTypeRepository;
use App\Repositories\CommissionType\CommissionTypeRepository;
use App\Repositories\OwnerType\OwnerTypeRepository;
use App\Repositories\PropertyStatus\PropertyStatusRepository;
use App\Repositories\UrgencyType\UrgencyTypeRepository;
use App\Repositories\InteriorLook\InteriorLookRepository;
use App\Repositories\ExteriorLook\ExteriorLookRepository;
use App\Repositories\NearByFacility\NearByFacilityRepository;
use App\Repositories\Environment\EnvironmentRepository;
use App\Repositories\Elevation\ElevationRepository;
use App\Repositories\PropertyGallery\PropertyGalleryRepository;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class PropertyController extends Controller
{
    public function __construct(PropertyRepository $property,PurposeRepository $purpose,PropertyCategoryRepository $property_category,FacilityRepository $facility,PropertyFacilityRepository $property_facility,PropertyTypeRepository $property_type,ClassTypeRepository $class_type,AdvertisementTypeRepository $advertisement_type,CommissionTypeRepository $commission_type,OwnerTypeRepository $owner_type,PropertyStatusRepository $property_status,UrgencyTypeRepository $urgency_type,InteriorLookRepository $interior_look,ExteriorLookRepository $exterior_look,NearByFacilityRepository $nearby_facility,EnvironmentRepository $environment,ElevationRepository $elevation,PropertyGalleryRepository $property_gallery){

        $this->property = $property;
        $this->purpose = $purpose;
        $this->property_category = $property_category;
        $this->facility = $facility;
        $this->property_facility = $property_facility;
        $this->property_type = $property_type;
        $this->class_type = $class_type;
        $this->advertisement_type = $advertisement_type;
        $this->commission_type = $commission_type;
        $this->owner_type = $owner_type;
        $this->property_status = $property_status;
        $this->urgency_type = $urgency_type;
        $this->interior_look = $interior_look;
        $this->exterior_look = $exterior_look;
        $this->nearby_facility = $nearby_facility;
        $this->environment = $environment;
        $this->elevation = $elevation;
        $this->property_gallery = $property_gallery;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->property->orderBy('created_at','desc')->with('purpose')->get();
        return view('admin.property.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $property_types = $this->property_type->orderBy('created_at','desc')->get();
        $categories = $this->property_category->orderBy('created_at','desc')->get();
        $facilities = $this->facility->orderBy('created_at','desc')->get();
        $class_types = $this->class_type->orderBy('created_at','desc')->get();
        $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
        $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
        return view('admin.property.create',compact('purposes','categories','facilities','property_types','class_types','advertisement_types','commission_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'purpose_id'=>'required|integer',
            'name'=>'required',
            'propertytype_id'=>'required|integer',
        ]);
        DB::beginTransaction();
        $property = $this->property->create($request->all());
        if($request->facilities){
            foreach($request->facilities as $facility){
                $data['facility_id'] = $facility;
                $data['property_id'] = $property->id;
                $this->property_facility->create($data);
            }
        }
        DB::commit();
        return redirect()->route('property.index')->with('message','Property Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = $this->property->with(['environments','facilities','interior_looks','exterior_looks','nearbyfacilities'])->findOrFail($id);

        if($detail->propertycategory=='House'){
            $property_category = $this->property_category->with(['propertyType'])->where('name','House')->first();
            $property_types = $property_category->propertyType;
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $class_types = $this->class_type->orderBy('created_at','desc')->get();
            $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
            $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
            $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
            $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
            $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
            $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
            $facilities = $this->facility->orderBy('created_at','desc')->get();
            $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
            $environments = $this->environment->orderBy('created_at','desc')->get();
            $elevations = $this->elevation->orderBy('created_at','desc')->get();
            return view('admin.property.house.edit',compact('detail','property_types','class_types','advertisement_types','purposes','commission_types','owner_types','property_statuses','exterior_looks','interior_looks','facilities','nearby_facilities','environments','elevations','urgency_types'));
        }
        if($detail->propertycategory=='Land'){
            $property_category = $this->property_category->with(['propertyType'])->where('name','Land')->first();
            $property_types = $property_category->propertyType;
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $class_types = $this->class_type->orderBy('created_at','desc')->get();
            $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
            $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
            $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
            $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
            $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
            $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
            $facilities = $this->facility->orderBy('created_at','desc')->get();
            $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
            $environments = $this->environment->orderBy('created_at','desc')->get();
            $elevations = $this->elevation->orderBy('created_at','desc')->get();

            return view('admin.property.land.edit',compact('detail','property_types','purposes','class_types','advertisement_types','commission_types','owner_types','purposes','property_statuses','urgency_types','interior_looks','exterior_looks','facilities','nearby_facilities','environments','elevations'));
        }
        if($detail->propertycategory=='Apartment'){
            $property_category = $this->property_category->with(['propertyType'])->where('name','Apartment')->first();
            $property_types = $property_category->propertyType;
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $class_types = $this->class_type->orderBy('created_at','desc')->get();
            $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
            $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
            $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
            $purposes = $this->purpose->orderBy('created_at','desc')->get();
            $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
            $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
            $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
            $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
            $facilities = $this->facility->orderBy('created_at','desc')->get();
            $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
            $environments = $this->environment->orderBy('created_at','desc')->get();
            $elevations = $this->elevation->orderBy('created_at','desc')->get();

            return view('admin.property.apartment.edit',compact('detail','property_types','purposes','class_types','advertisement_types','commission_types','owner_types','purposes','property_statuses','urgency_types','interior_looks','exterior_looks','facilities','nearby_facilities','environments','elevations'));
        }
        abort(404);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'purpose_id'=>'required|integer',
            'name'=>'required',
            'propertytype_id'=>'required|integer',
            'land_area_in_sqft_mes'=>'nullable|numeric',
            'kitchens'=>'nullable|numeric',
            'floors'=>'nullable|numeric',
            'bedrooms'=>'nullable|numeric',
            'bathrooms'=>'nullable|numeric',
            'shutters'=>'nullable|numeric',
            'living_room'=>'nullable|numeric',
            'room_per_floor'=>'nullable|numeric',
            'parking'=>'nullable|numeric',
        ],
        [
            'land_area_in_sqft_mes.numeric'=>'Land Area In Sqft According To Measurement should be Number',
        ]);
        
        DB::beginTransaction();
        $property_data = $request->except('gallery_images');
        if($request->feature_image){
            $image = $this->featureImage($request->file('feature_image'));
            $property_data['feature_image'] = $image;
        }
        $this->property->update($property_data,$id);
        $property = $this->property->findOrFail($id);

        if($request->facilities_id){
            $property->facilities()->detach();
            $property->facilities()->attach($request->facilities_id);
        }else{
            $property->facilities()->detach();
        }

        if($request->interior_look_id){
            $property->interior_looks()->detach();
            $property->interior_looks()->attach($request->interior_look_id);
        }else{
            $property->interior_looks()->detach();
        }

        if($request->nearby_facilities){
            $property->nearbyfacilities()->detach();
            $property->nearbyfacilities()->attach($request->nearby_facilities);
        }else{
            $property->nearbyfacilities()->detach();
        }

        if($request->exterior_look_id){
            $property->exterior_looks()->detach();
            $property->exterior_looks()->attach($request->exterior_look_id);
        }else{
            $property->exterior_looks()->detach();
        }

        if($request->environments){
            $property->environments()->detach();
            $property->environments()->attach($request->environments);
        }else{
            $property->environments()->detach();
        }
        if($request->gallery_images && $request->filename){
            $this->property_gallery->where('property_id',$property->id)->delete();
            $this->saveGalleryImages($property->id,$request->filename);
        }

        DB::commit();
        return redirect()->route('property.index')->with('message','Property Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->property->destroy($id);
        return redirect()->back()->with('message','Property Deleted Successfully');
    }
    
    
    public function addHouse(Request $request){
        $property_category = $this->property_category->with(['propertyType'])->where('name','House')->first();
        
        $property_types = $property_category->propertyType;
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $class_types = $this->class_type->orderBy('created_at','desc')->get();
        $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
        $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
        $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
        $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
        $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
        $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
        $facilities = $this->facility->orderBy('created_at','desc')->get();
        $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
        $environments = $this->environment->orderBy('created_at','desc')->get();
        $elevations = $this->elevation->orderBy('created_at','desc')->get();

        return view('admin.property.house.create',compact('property_types','purposes','class_types','advertisement_types','commission_types','owner_types','purposes','property_statuses','urgency_types','interior_looks','exterior_looks','facilities','nearby_facilities','environments','elevations'));
    }
    public function saveHouse(Request $request){
        
        $this->validate($request,[
            'purpose_id'=>'required|integer',
            'name'=>'required',
            'propertytype_id'=>'required|integer',
            'land_area_in_sqft_mes'=>'nullable|numeric',
            'kitchens'=>'nullable|numeric',
            'floors'=>'nullable|numeric',
            'bedrooms'=>'nullable|numeric',
            'bathrooms'=>'nullable|numeric',
            'shutters'=>'nullable|numeric',
            'living_room'=>'nullable|numeric',
            'room_per_floor'=>'nullable|numeric',
            'parking'=>'nullable|numeric',
        ],
        [
            'land_area_in_sqft_mes.numeric'=>'Land Area In Sqft According To Measurement should be Number',
        ]);
        DB::beginTransaction();
        $property_data = $request->except('gallery_images');
        $property_data['propertycategory'] = 'House';

        if($request->feature_image){
            $image = $this->featureImage($request->file('feature_image'));
            $property_data['feature_image'] = $image;
        }

        $property = $this->property->create($property_data);

        if($request->facilities_id){
            $property->facilities()->attach($request->facilities_id);
        }

        if($request->interior_look_id){
            $property->interior_looks()->attach($request->interior_look_id);
        }

        if($request->nearby_facilities){
            $property->nearbyfacilities()->attach($request->nearby_facilities);
        }

        if($request->exterior_look_id){
            $property->exterior_looks()->attach($request->exterior_look_id);
        }

        if($request->environments){
            $property->environments()->attach($request->environments);
        }
        if($request->gallery_images && $request->filename){
            $this->saveGalleryImages($property->id,$request->filename);
        }


        DB::commit();
        return redirect()->route('property.index')->with('message','Property Added Successfully');
    }
    public function addLand(Request $request){
        $property_category = $this->property_category->with(['propertyType'])->where('name','Land')->first();

        $property_types = $property_category->propertyType;
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $class_types = $this->class_type->orderBy('created_at','desc')->get();
        $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
        $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
        $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
        $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
        $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
        $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
        $facilities = $this->facility->orderBy('created_at','desc')->get();
        $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
        $environments = $this->environment->orderBy('created_at','desc')->get();
        $elevations = $this->elevation->orderBy('created_at','desc')->get();

        return view('admin.property.land.create',compact('property_types','purposes','class_types','advertisement_types','commission_types','owner_types','purposes','property_statuses','urgency_types','interior_looks','exterior_looks','facilities','nearby_facilities','environments','elevations'));
    }
    public function saveLand(Request $request){
        $this->validate($request,[
            'purpose_id'=>'required|integer',
            'name'=>'required',
            'propertytype_id'=>'required|integer',
            'land_area_in_sqft_mes'=>'nullable|numeric',
            'kitchens'=>'nullable|numeric',
            'floors'=>'nullable|numeric',
            'bedrooms'=>'nullable|numeric',
            'bathrooms'=>'nullable|numeric',
            'shutters'=>'nullable|numeric',
            'living_room'=>'nullable|numeric',
            'room_per_floor'=>'nullable|numeric',
            'parking'=>'nullable|numeric',
        ],
        [
            'land_area_in_sqft_mes.numeric'=>'Land Area In Sqft According To Measurement should be Number',
        ]);
        DB::beginTransaction();
        $property_data = $request->except('gallery_images');
        $property_data['propertycategory'] = 'Land';
        if($request->feature_image){
            $image = $this->featureImage($request->file('feature_image'));
            $property_data['feature_image'] = $image;
        }
        $property = $this->property->create($property_data);

        if($request->facilities_id){
            $property->facilities()->attach($request->facilities_id);
        }

        if($request->interior_look_id){
            $property->interior_looks()->attach($request->interior_look_id);
        }

        if($request->nearby_facilities){
            $property->nearbyfacilities()->attach($request->nearby_facilities);
        }

        if($request->exterior_look_id){
            $property->exterior_looks()->attach($request->exterior_look_id);
        }

        if($request->environments){
            $property->environments()->attach($request->environments);
        }
        if($request->gallery_images && $request->filename){
            $this->saveGalleryImages($property->id,$request->filename);
        }

        DB::commit();
        return redirect()->route('property.index')->with('message','Property Added Successfully');
    }
    public function addApartment(Request $request){
        $property_category = $this->property_category->with(['propertyType'])->where('name','Apartment')->first();
        $property_types = $property_category->propertyType;
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $advertisement_types = $this->advertisement_type->orderBy('created_at','desc')->get();
        $commission_types = $this->commission_type->orderBy('created_at','desc')->get();
        $class_types = $this->class_type->orderBy('created_at','desc')->get();
        $owner_types = $this->owner_type->orderBy('created_at','desc')->get();
        $purposes = $this->purpose->orderBy('created_at','desc')->get();
        $property_statuses = $this->property_status->orderBy('created_at','desc')->get();
        $urgency_types = $this->urgency_type->orderBy('created_at','desc')->get();
        $interior_looks = $this->interior_look->orderBy('created_at','desc')->get();
        $exterior_looks = $this->exterior_look->orderBy('created_at','desc')->get();
        $facilities = $this->facility->orderBy('created_at','desc')->get();
        $nearby_facilities = $this->nearby_facility->orderBy('created_at','desc')->get();
        $environments = $this->environment->orderBy('created_at','desc')->get();
        $elevations = $this->elevation->orderBy('created_at','desc')->get();

        return view('admin.property.apartment.create',compact('property_types','purposes','advertisement_types','commission_types','owner_types','purposes','property_statuses','urgency_types','interior_looks','exterior_looks','facilities','nearby_facilities','environments','elevations','class_types'));
    }
    public function saveApartment(Request $request){
        $this->validate($request,[
            'purpose_id'=>'required|integer',
            'name'=>'required',
            'propertytype_id'=>'required|integer',
            'land_area_in_sqft_mes'=>'nullable|numeric',
            'kitchens'=>'nullable|numeric',
            'floors'=>'nullable|numeric',
            'bedrooms'=>'nullable|numeric',
            'bathrooms'=>'nullable|numeric',
            'shutters'=>'nullable|numeric',
            'living_room'=>'nullable|numeric',
            'room_per_floor'=>'nullable|numeric',
            'parking'=>'nullable|numeric',
        ],
        [
            'land_area_in_sqft_mes.numeric'=>'Land Area In Sqft According To Measurement should be Number',
        ]);
        DB::beginTransaction();
        $property_data = $request->except('gallery_images');
        $property_data['propertycategory'] = 'Apartment';

        if($request->feature_image){
            $image = $this->featureImage($request->file('feature_image'));
            $property_data['feature_image'] = $image;
        }
        $property = $this->property->create($property_data);

        if($request->facilities_id){
            $property->facilities()->attach($request->facilities_id);
        }
        if($request->interior_look_id){
            $property->interior_looks()->attach($request->interior_look_id);
        }
        if($request->nearby_facilities){
            $property->nearbyfacilities()->attach($request->nearby_facilities);
        }
        if($request->exterior_look_id){
            $property->exterior_looks()->attach($request->exterior_look_id);
        }
        if($request->environments){
            $property->environments()->attach($request->environments);
        }
        if($request->gallery_images && $request->filename){
            $this->saveGalleryImages($property->id,$request->filename);
        }

        DB::commit();
        return redirect()->route('property.index')->with('message','Property Added Successfully');
    }

    public function featureImage($image){
        $extension = $image->getClientOriginalExtension();
        $filename  = \Str::random(19).'.'.$extension;
        $mainPath = public_path('images/property/main');
        $thumbPath = public_path('images/property/thumbnail');
        $file=Image::make($image);
        $file->orientate();
        
        $img = Image::make($image->getRealPath());
        $img->fit(940,500)->save($mainPath.'/'.$filename);
        $img1 = Image::make($image->getRealPath());
        $img1->fit(400, 300)->save($thumbPath.'/'.$filename);
        return $filename;
    }

    public function gallery(Request $request){
        $files = $request->file('gallery_images');
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $filename  = \Str::random(19).'.'.$extension;
            $detail['name'] = $filename;
            $detail['thumb_path'] = asset('images/property/thumbnail');
            $mainPath = public_path('images/property/main');
            $thumbPath = public_path('images/property/thumbnail');
            $img = Image::make($file->getRealPath());
            $img->fit(940,500)->save($mainPath.'/'.$filename);
            $img1 = Image::make($file->getRealPath());
            $img1->fit(400,300)->save($thumbPath.'/'.$filename);
            $name[] = $detail;
        }
        return response()->json($name);
    }
    public function removeImage(Request $request){
        $name = $request->name;
        $path = public_path('images/property/main');
        $thumbpath = public_path('images/property/thumbnail');
        
        unlink($path . '/' . $name);
        unlink($thumbpath . '/' . $name);
        
        $this->property_gallery->where('filename',$name)->delete();

        return;
    }
    public function saveGalleryImages($propertyid,$filename){
        for ($i = 0; $i < count($filename); $i++) {
            $input = array('property_id' => $propertyid, 'filename' => $filename[$i]);
            $this->property_gallery->create($input);
        }
    }
}
