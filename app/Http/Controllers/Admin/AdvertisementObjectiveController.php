<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AdvertisementObjective\AdvertisementObjectiveRepository;

class AdvertisementObjectiveController extends Controller
{
    public function __construct(AdvertisementObjectiveRepository $ad_objective){
        $this->ad_objective = $ad_objective;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = $this->ad_objective->orderBy('created_at','desc')->get();
        return view('admin.advertisement_objective.list',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advertisement_objective.create');
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
        $this->ad_objective->create($request->all());
        return redirect()->route('ad-objective.index')->with('message','Advertisement Objective Created Successfully');
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
        $detail = $this->ad_objective->findOrFail($id);
        return view('admin.advertisement_objective.edit',compact('detail'));
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
        $this->ad_objective->update($request->all(),$id);
        return redirect()->route('ad-objective.index')->with('message','Advertisement Objective Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ad_objective->destroy($id);
        return redirect()->back()->with('message','Advertisement Objective Deleted Successfullt');
    }
}
