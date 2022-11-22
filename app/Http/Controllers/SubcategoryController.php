<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use\App\Http\Controllers\CategoryController;
use\App\Http\Controllers\SubcategoryController;


class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories =Subcategory::all();
        return view('admin.subcategory.subcategoryshow',compact('subcategories'));
    }

    public function create()
    {
        $categories =Category::all();
        return view('admin.subcategory.create',compact('categories'));
    }


    public function store(Request $request)
    {
        $subcategory = new Subcategory;
        $subcategory->cat_id = $request->category;
        $subcategory->name = $request->name;
        $subcategory->description = $request->description;
        // //for multiple image up
        // if($request->hasfile('image')){
        //     $file      = $request->file('image');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename  =time().'.'.$extention;
        //     $file->move('category',$filename);
        //     $category->image=$filename;
        // }
        $subcategory->save();
        return redirect()->back()->with('message','Sub Category Uploaded Successfully');
    }


    public function sub_cat_change(Subcategory $Subcategory)
    {
       if($Subcategory->status==1){
        $Subcategory->Update(['status'=>0]);
       }
       else{
        $Subcategory->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Sub Category status change Successfully');
    }


    public function edit(Subcategory $Subcategory,$id)
    {
        $categories =Category::All();
       return view ('admin.subcategory.edit',compact('categories','Subcategory'));
    }


    public function update(Request $request, Subcategory $Subcategory,$id)
    {
        $update=$Subcategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->Category,
            'description'=>$request->description,

           ]);

           return redirect('sub-categories')->with('message','Sub Category Updatetd Successfully');
    }


    public function destroy(Subcategory $Subcategory,$id)
    {
        $delete=$Subcategory->delete();
       if($delete){
       return redirect('sub-categories')->with('message','Sub Category deleted Successfully');
    }
    }
}
