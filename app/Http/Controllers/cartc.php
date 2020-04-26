<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\support\Facades\Redirect;
class cartc extends Controller
{
    //
    public function add_to_cart(Request $request){
    $qty=$request->qty;
    $product_id=$request->product_id;
    $product_info=DB::table('tbl_products')
    ->where('product_id',$product_id)
    ->first();

    $data['qty']=$qty;

    $data['id']=$product_info->product_id;

    $data['name']=$product_info->product_name;

    $data['price']=$product_info->product_price;

    $data['options']['image']=$product_info->product_image;
    Cart::add($data);
    return redirect('/show-cart');
    }
    	public function show_cart(Request $request){
    		$all_published_category=DB::table('tbl_category')
    		->where('publication_status',1)
    		->get();

    		$manage_published_category=view('pages.add_to_cart')
        ->with('all_published_product',$all_published_category);
    	return view('layout')
        ->with('pages.add_to_cart',$manage_published_category);
    	}
    	public function delete_cart($rowId){
    		Cart::update($rowId,0);
    		return redirect('/show-cart');
    	}
    	public function update_cart(Request $request){
    		$qty=$request->qty;
    		$rowId=$request->rowId;
    		Cart::update($rowId,$qty);
    		return redirect('/show-cart');
    	}
}
