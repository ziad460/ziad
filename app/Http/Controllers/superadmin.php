<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();
class superadmin extends Controller
{
    public function logout(){
    //	Session::put('admin_name',null);
    //	Session::put('admin_id',null);
    	Session::flush();
    	return redirect('/admin');
    }
     public function index(){
     	$this->AdminAuthCheck();
    	return view('admin.dashboard');
    }
    public function AdminAuthCheck(){
    	$admin_id=Session::get('admin_id');
    	if($admin_id){
    		return;
    	}else{
    		return redirect('/admin')->send();
    	}
    }
}
