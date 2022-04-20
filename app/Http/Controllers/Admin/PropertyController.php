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
use DB;

class PropertyController extends Controller
{
    public function __construct(PropertyRepository $property,PurposeRepository $purpose,PropertyCategoryRepository $property_category,FacilityRepository $facility,PropertyFacilityRepository $property_facility,PropertyTypeRepository $property_type,ClassTypeRepository $class_type,AdvertisementTypeRepository $advertisement_type,CommissionTypeRepository $commission_type){
        $this->property = $property;
        $this->purpose = $purpose;
        $this->property_category = $property_category;
        $this->facility = $facility;
        $this->property_facility = $property_facility;
        $this->property_type = $property_type;
        $this->class_type = $class_type;
        $this->advertisement_type = $advertisement_type;
        $this->commission_type = $commission_type;
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
        $detail = $this->property->findOrFail($id);

        $purposes = $this->purpose->get();
        $categories = $this->property_category->get();
        $facilities = $this->facility->get();
        $property_types = $this->property_type->get();
        return view('admin.property.edit',compact('detail','purposes','categories','facilities','property_types'));
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
        ]);
        
        $this->property->update($request->all(),$id);
        if($request->facilities){
            $this->updatePivotTable($id, $request->facilities);
        }else{
            $this->property->deletePivotTable($id);
        }
        
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
        //
    }
    public function updatePivotTable($propertyId, $facilities)
    {

        $this->property->deletePivotTable($propertyId);

        for ($i = 0; $i < count($facilities); $i++) {
            $input = array('property_id' => $propertyId, 'facility_id' => $facilities[$i]);
            $this->property->savePivotTable($input);
        }
    }
    public function getPropertyTypes(Request $request){
        $property_types = $this->property_type->where('propertycategory_id',$request->id)->get();
        return $property_types;
    }
}
