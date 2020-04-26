<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class manufacture extends Controller
{
    public function index(){
    	return view('admin.add_manufacture');
    }
    public function save_manufacture(Request $request){
     	$data=array();
     	$data['manufacture_id']=$request->manufacture_id;
     	$data['manufacture_name']=$request->manufacture_name;
     	$data['manufacture_description']=$request->manufacture_description;
     	$data['publication_status']=$request->publication_status;
     	DB::table('tbl_manufacture')->insert($data);
     	Session::put('message','manufacture added successfully !!');
    	return redirect('/add-manufacture');
    }
     public function all_manufacture(){
        $all_manufacture_info=DB::table('tbl_manufacture')->get();
        $manage_manufacture=view('admin.all_manufacture')
        ->with('all_manufacture_info',$all_manufacture_info);
    	return view('admin_layout')
        ->with('admin.all_manufacture',$manage_manufacture);
    }
    public function delete_manufacture($manufacture_id)
    {
     $manufacture_info=DB::table('tbl_manufacture')
       ->where('manufacture_id',$manufacture_id)
       ->delete();
       Session::put('message','manufacture deleted');
       return redirect('/all-manufacture');
   }
    public function unactive_manufacture($manufacture_id){
         DB::table('tbl_manufacture')->
         where('manufacture_id',$manufacture_id)
         ->update(['publication_status'=>0]);
         Session::put('message','manufacture unactive successfully !!');
         return redirect('/all-manufacture');
    }
     public function active_manufacture($manufacture_id){
         DB::table('tbl_manufacture')->
         where('manufacture_id',$manufacture_id)
         ->update(['publication_status'=>1]);
         Session::put('message','manufacture active successfully !!');
         return redirect('/all-manufacture');
    }
     public function edit_manufacture($manufacture_id)
    {
     $manufacture_info=DB::table('tbl_manufacture')
       ->where('manufacture_id',$manufacture_id)
       ->first();
       
     $manufacture_info = view('admin.edit_manufacture')
       ->with('manufacture_info',$manufacture_info);
     return view('admin_layout')
     ->with('admin.edit_manufacture',$manufacture_info);
 }
  public function update_manufacture(Request $request,$manufacture_id)
    {
        $data=array();
        
        $data['manufacture_name']=$request->manufacture_name;
        $data['manufacture_description']=$request->manufacture_description;
        DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)
        ->update($data);
        Session::put('message','manufacture updated successfully !!');
        return redirect('/all-manufacture');

    }
}
