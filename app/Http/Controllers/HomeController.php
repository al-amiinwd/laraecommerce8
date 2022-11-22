<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Support\Facades\File;
use\App\Http\Controllers\ProductController;
use DB;


class HomeController extends Controller
{
    public function Home(){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::all();
        $colors = Color::all();
        $products = Product::where('status',1)->latest()->limit(12)->get();

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontent.home',compact('products','categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','topProducts'));
    }

    public function view_details($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $units = Unit::all();
        $sizes = Size::find($product->size_id);
        $colors = Color::find($product->color_id);
        $cat_id=$product->cat_id;
        $related_products=Product::where('cat_id',$cat_id)->limit(4)->get();
        return view('frontent.pages.details',compact('product','categories', 'subcategories', 'brands', 'units', 'sizes', 'colors','related_products'));
    }

    public function product_by_cat($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $products= Product::where('status',1)->where('cat_id',$id)->limit(12)->get();

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(3)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontent.pages.product_by_cat',compact('categories', 'subcategories', 'brands','products','topProducts'));
    }

    public function product_by_subcat($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $products= Product::where('status',1)->where('subcat_id',$id)->limit(12)->get();
        return view('frontent.pages.product_by_subcat',compact('categories', 'subcategories', 'brands','products'));
    }

    public function product_by_brand($id){
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $products= Product::where('status',1)->where('brand_id',$id)->limit(12)->get();
        return view('frontent.pages.product_by_brand',compact('categories', 'subcategories', 'brands','products'));
    }
    public function search(Request $request){
        $products=Product::orderBy('id','desc')->where('name','LIKE','%'.$request->products.'%');
        if($request->category != 'All') $products->where('cat_id',$request->category);
        $products=$products->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('frontent.pages.product_by_subcat',compact('categories', 'subcategories', 'brands','products'));
    }


}
