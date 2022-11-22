<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Product;
use Cart;

class CardController extends Controller
{
    public function add_to_cart(Request $request){
        $quantity=$request->quantity;
        $id=$request->id;

        $products=Product::where('id',$id)->first();
        $data['quantity']=$quantity;
        $data['id']=$products->id;
        $data['name']=$products->name;
        $data['price']=$products->price;
        $data['attributes']=[$products->image];
        Cart::add($data);

        cardArray();
        return redirect()->back();
    }

    public function delete($id){

        Cart::remove($id);
        return redirect()->back();
    }
}
