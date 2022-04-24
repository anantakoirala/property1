<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\InteriorLook\InteriorLookRepository;

class InteriorLookController extends Controller
{
    public function __construct(InteriorLookRepository $interior_look){
        $this->interior_look = $interior_look;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->interior_look->orderBy('created_at','desc')->get();
        return view('admin.interiorLook.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.interiorLook.create');
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
        $this->interior_look->create($request->all());
        return redirect()->route('interior-look.index')->with('message','Interior Look Created Successfully');
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
        $detail = $this->interior_look->findOrFail($id);
        return view('admin.interiorLook.edit',compact('detail'));
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
        $this->interior_look->update($request->all(),$id);
        return redirect()->route('interior-look.index')->with('message','Interior Look Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->interior_look->destroy($id);
        return redirect()->back()->with('message','Interior Look Deleted Successfully');
    }
}
