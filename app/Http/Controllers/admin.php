<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class admin extends Controller
{
    //
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(){
    	return view('admin.dashboard');
    }
    public function dashboard(Request $request){
    	$admin_email=$request->admin_email;
    	$admin_password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    	->where('admin_email',$admin_email)
    	->where('admin_password',$admin_password)
    	->first();
    	if($result){
    		Session::put('admin_name',$result->admin_name);
    		Session::put('admin_id',$result->admin_id);
    		return redirect('/dashboard');
    	}else{
    		Session::put('messege','Email or password invalid');
    		return redirect('/admin');
    	}
    }
}
