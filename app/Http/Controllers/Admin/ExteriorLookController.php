<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\ExteriorLook\ExteriorLookRepository;

class ExteriorLookController extends Controller
{
    public function __construct(ExteriorLookRepository $exterior_look){
        $this->exterior_look = $exterior_look;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->exterior_look->orderBy('created_at','desc')->get();
        return view('admin.exteriorLook.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.exteriorLook.create');
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
            'name'=>'required',
        ]);
        $this->exterior_look->create($request->all());
        return redirect()->route('exterior-look.index')->with('message','Exterior Look Added Successfully');
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
        $detail = $this->exterior_look->findOrFail($id);
        return view('admin.exteriorLook.edit',compact('detail'));
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
            'name'=>'required',
        ]);
        $this->exterior_look->update($request->all(),$id);
        return redirect()->route('exterior-look.index')->with('message','Exterior Look Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->exterior_look->destroy($id);
        return redirect()->back()->with('message','Exterior Look Deleted Successfully');
    }
}
