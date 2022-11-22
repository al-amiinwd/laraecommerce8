<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use\App\Http\Controllers\ColorController;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colors=explode(',',$request->color);
        $color=new Color;
        $color->color=json_encode($colors);
        $color->save();

        return redirect()->back()->with('message','Color  added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function color_change(Color $color)
    {
       if($color->status==1){
        $color->Update(['status'=>0]);
       }
       else{
        $color->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Color status change Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view ('admin.color.edit',compact('color'));
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
        $color=new Color;
        $color->name=$request->input('name');
        $color->description=$request->input('description');
        $color->update();

        return redirect()->back()->with('message','Color updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();


        return redirect('color')->with('message','Color deleted Successfully');
    }
}
