<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use\App\Http\Controllers\SizeController;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('admin.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sizes=explode(',',$request->size);
        $size=new Size;
        $size->size=json_encode($sizes);
        $size->save();

        return redirect()->back()->with('message','Size  added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function size_change(Size $size)
    {
       if($size->status==1){
        $size->Update(['status'=>0]);
       }
       else{
        $size->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Size status change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $size = Size::find($id);
        return view ('admin.size.edit',compact('size'));
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
        $size=new Size;
        $size->name=$request->input('name');
        $size->description=$request->input('description');
        $size->update();

        return redirect()->back()->with('message','Size updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $size = Size::find($id);
        $size->delete();


        return redirect('size')->with('message','Size deleted Successfully');
    }
}
