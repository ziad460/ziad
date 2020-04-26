<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;

class checkout extends Controller
{
    //
    public function login_check(){
    	return view('pages.login');
    }
    public function reg(Request $request)
    {
    	$data=array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=md5($request->password);

    	$customer_id=DB::table('tbl_customer')
    	->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return redirect('/checkout');

    }
    public function checkout(){
    	$all_published_category=DB::table('tbl_category')
    		->where('publication_status',1)
    		->get();

    		$manage_published_category=view('pages.checkout')
        ->with('all_published_product',$all_published_category);
    	return view('layout')
        ->with('pages.checkout',$manage_published_category);
    	
    }
    public function payment(){
    	return view('pages.payment');
    }
    public function order_place(Request $request)
    {
    	$payment_gateway=$request->payment_method;
    	$pdata=array();
    	$pdata['payment_method']=$payment_gateway;
    	$pdata['payment_status']='pending';
    	$payment_id=DB::table('tbl_payment')
    	->insertGetId($pdata);

    	$odata=array();
    		$odata['customer_id']=Session::get('customer_id');
    		$odata['shipping_id']=Session::get('shipping_id');
    		$odata['payment_id']=$payment_id;
    		$odata['order_total']=Cart::total();
    		$odata['order_status']='pending';
    		$order_id=DB::table('tbl_order')
    		->insertGetId($odata);

    		$contents=Cart::content();
    		$oddata=array();
    		foreach($contents as $v_content){
    		$oddata['order_id']=$order_id;
    		$oddata['product_id']=$v_content->id;
    		$oddata['product_name']=$v_content->name;
    		$oddata['product_price']=$v_content->price;
    		$oddata['product_sales_quatity']=$v_content->qty;
    		
    		DB::table('tbl_order_details')
    		->insertGetId($oddata);
    	}
    	if($payment_gateway=='handcash'){
    		Cart::destroy();
    		return view('pages.handcash');
    	}
    	elseif($payment_gateway=='paybal'){
    	Cart::destroy();
            return view('pages.handcash');
    	}



    	
    }
    public function save_shipping(Request $request)
    {
    	$data=array();
    	$data['shipping_email']=$request->shipping_email;
    	$data['shipping_name']=$request->shipping_name;
    	$data['shipping_address']=$request->shipping_address;
    	$data['shipping_city']=$request->shipping_city;

    	$shipping_id=DB::table('tbl_shipping')
    	->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);
    	return redirect('/payment');

    }
    public function   customer_login(Request $request)
    {
    	$customer_email=$request->customer_email;
    	$password=md5($request->password);

    	$result=DB::table('tbl_customer')
    	->where('customer_email',$customer_email)
    	->where('password',$password)
    	->first();

    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return redirect('/checkout');
    	}else{
    		return redirect('/login-check');
    	}
    }
    public function   customer_logout()
    {
    	Session::flush();
    	return redirect('/');
    }
    public function  manage_order(){
    	  $all_order_info=DB::table('tbl_order')
        ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_order.*','tbl_customer.customer_name')
        ->get();
        $manage_order=view('admin.manage_order')
        ->with('all_order_info',$all_order_info);
    	return view('admin_layout')
        ->with('admin.manage_order',$manage_order);
    }

}
