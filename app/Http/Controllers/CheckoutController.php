<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shipping;
use App\Models\payment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Customer;
use DB;
use Cart;
use Session;



class CheckoutController extends Controller
{
    public function index(){
        $customer_id=Customer::where('id',session::get('id'))->first();
        return view('frontent.pages.checkout', compact('customer_id'));
    }
    public function login(){
        return view('frontent.pages.login');
    }


    public function payment(){
        $cart_collection=Cart::getContent();
        $cart_array=$cart_collection->toArray();
        return view('frontent.pages.payment', compact('cart_array'));
    }

    public function save_shipping(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['city']=$request->city;
        $data['country']=$request->country;
        $data['zip_code']=$request->zip_code;
        $data['mobile']=$request->mobile;
        $s_id=Shipping::insertGetId($data);
        session::put('sid',$s_id);
        return redirect::to('payment');

    }
    public function order(Request $request){
        $payment_method=$request->payment;
        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['status']='pending';
        $payment_id=Payment::insertGetId($pdata);

        $odata=array();
        $odata['cus_id']=Session::get('id');
        $odata['shipping_id']=Session::get('sid');
        $odata['pay_id']=$payment_id;
        $odata['total']=Cart::getTotal();
        $odata['status']='pending';
        $Order_id=Order::insertGetId($odata);

        $cart_collection=Cart::getContent();

        $odata=array();
        Foreach ($cart_collection as $cartContent){
            $odata['order_id']=$Order_id;
            $odata['product_id']=$cartContent->id;
            $odata['product_name']=$cartContent->name;
            $odata['product_price']=$cartContent->price;
            $odata['product_sales_quantity']=$cartContent->quantity;
            DB::table('order_details')->insert($odata);

        }
        if($payment_method=='Cash'){
            Cart::clear();
            return view('frontent.pages.payment_message');

        }elseif($payment_method=='Bkash'){
        Cart::clear();
            return view('frontent.pages.payment_message');

        }elseif($payment_method=='Nagot'){
        Cart::clear();
         return view('frontent.pages.payment_message');

        }elseif($payment_method=='Rocket'){
        Cart::clear();
        return view('frontent.pages.payment_message');
        }
    }

}
