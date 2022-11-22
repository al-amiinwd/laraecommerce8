<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use\App\Http\Controllers\CategoryController;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categoryshow',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $category=new Category;
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().".".$extention;
            $file->move('category',$filename);
            $category->image=$filename;
        }
        $category->save();

        return redirect()->back()->with('message','Category  added successfully');

    }


    public function cat_change(Category $category)
    {
       if($category->status==1){
        $category->Update(['status'=>0]);
       }
       else{
        $category->Update(['status'=>1]);
       }
       return redirect()->back()->with('message','Category status change Successfully');
    }


    public function edit($id)
    {
      $category = Category::find($id);
       return view ('admin.category.edit',compact('category'));
    }


    public function update($id, Request $request)
    {
        $category=new Category;
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        if($request->hasfile('image')){

            $destination ='category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().".".$extention;
            $file->move('category/',$filename);
            $category->image=$filename;
        }
        $category->update();

        return redirect()->back()->with('message','category updated successfully');
    }


    public function destroy($id)
    {
       $category = Category::find($id);
       $destination ='category/'.$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
       $category->delete();


       return redirect('categories')->with('message','Category deleted Successfully');
    }
}
