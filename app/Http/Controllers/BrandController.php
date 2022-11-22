<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use\App\Http\Controllers\BrandController;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=new Brand;
        $brand->name=$request->input('name');
        $brand->description=$request->input('description');
        $brand->save();

        return redirect()->back()->with('message','Brand  added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function brand_change(Brand $brand)
    {
       if($brand->status==1){
        $brand->Update(['status'=>0]);
       }
       else{
        $brand->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Brand status change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view ('admin.brand.edit',compact('brand'));
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
        $brand=new Brand;
        $brand->name=$request->input('name');
        $brand->description=$request->input('description');
        $brand->update();

        return redirect()->back()->with('message','Brand updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();


        return redirect('brand')->with('message','Brand deleted Successfully');
    }
}
