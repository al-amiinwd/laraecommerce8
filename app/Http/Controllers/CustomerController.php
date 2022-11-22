<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Customer;
use Session;

class CustomerController extends Controller
{
    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $result=Customer::where('email',$email)->where('password',$password)->first();

        if($result){
            return redirect::to('checkout');
        }else{
            return redirect::to('login-check');
        }

    }

    public function registration(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=$request->password;
        $data['mobile']=$request->mobile;
        $id=Customer::insertGetId($data);
        session::put('id',$id);
        session::put('name',$request->name);
        return redirect::to('checkout');

    }

    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }
}
