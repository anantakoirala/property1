<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PropertyType\PropertyTypeRepository;
use App\Repositories\PropertyCategory\PropertyCategoryRepository;

class PropertyTypeController extends Controller
{
    public function __construct(PropertyTypeRepository $property_type,PropertyCategoryRepository $property_category){
        $this->property_type = $property_type;
        $this->property_category = $property_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->property_type->orderBy('created_at','desc')->get();
        return view('admin.propertytype.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->property_category->get();
        return view('admin.propertytype.create',compact('categories'));
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
            'propertycategory_id'=>'required|integer',
            'name'=>'required',
        ]);
        $this->property_type->create($request->all());
        return redirect()->route('property-type.index')->with('message','Property Type Added Successfully');
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
        $categories = $this->property_category->get();
        $detail = $this->property_type->findOrFail($id);
        return view('admin.propertytype.edit',compact('categories','detail'));
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
            'propertycategory_id'=>'required|integer',
            'name'=>'required',
        ]);
        $this->property_type->update($request->all(),$id);
        return redirect()->route('property-type.index')->with('message','Property Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->property_type->destroy($id);
        return redirect()->back()->with('message','Property Type Deleted');
    }
}
