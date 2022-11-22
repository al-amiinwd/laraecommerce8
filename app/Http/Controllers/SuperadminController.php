<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
Session_start();

class SuperadminController extends Controller
{
    public function Dashboard(){
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/admin');
    }

    public function AdminAuthCheck(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/admin')->send();
        };
    }
}
