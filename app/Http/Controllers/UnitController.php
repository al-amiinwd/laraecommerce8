<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use\App\Http\Controllers\UnitController;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit=new Unit;
        $unit->name=$request->input('name');
        $unit->description=$request->input('description');
        $unit->save();

        return redirect()->back()->with('message','Unit  added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unit_change(Unit $unit)
    {
       if($unit->status==1){
        $unit->Update(['status'=>0]);
       }
       else{
        $unit->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Unit status change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::find($id);
        return view ('admin.unit.edit',compact('unit'));
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
        $unit=new Unit;
        $unit->name=$request->input('name');
        $unit->description=$request->input('description');
        $unit->update();

        return redirect()->back()->with('message','Unit updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::find($id);
        $unit->delete();


        return redirect('unit')->with('message','Unit deleted Successfully');
    }
}
