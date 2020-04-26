<?php

namespace App\Http\Controllers;
use App\product;
use App\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();

//session()->put('a','safy');            
//session()->all()
        // load the view and pass the nerds
        return view('product.index',compact('products'));
    }
    public function indexuser()
    {
        $products = product::all();

        return view('product.indexuser',compact('products'));


    }
    public function showuser(Request $request)
    {
        $id=$request->input('id');
        $products = product::find($id);

        // load the view and pass the nerds
        //return view('book.show')
            //->with('books', $books);
            return view('product.showuser',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $ns=$request->input('n');
        //$this->show();
      $products=DB::table('product')->where('name',$ns)->get();
//);
         return view('product.showb',compact('products'));
    }
    public function searchuser(Request $request)
    {
        $ns=$request->input('n');
        //$aname=$request->input('aname');
        //$this->show();
      $products=DB::table('product')->where('name',$ns)->get();
//);
         return view('product.showuserb',compact('products'));
    }
    public function store(Request $request)
    {
        $pname=$request->input('pname');
        $pprice=$request->input('pprice');
        $pqty=$request->input('pqty');
        //$pname=$request->input('aname');
        $product=new product;
        $product->name=$pname;
        $file = $request->file('image');
        $extention=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extention;
        $file->move('uploads/images/',$fileName);
       // $fileName =$image->
//Storage::put('upload/images/'.$fileName , file_get_contents($request->file('image')->getRealPath()));
$product->image=$fileName;
        $product->price=(int)$pprice;
        $product->qty=(int)$pqty;
        $product->save();
        //$this->show();
  //      DB::table('books')->insert(
   // ['name' => $bname, 'author' => $aname]
//);
        return redirect('product');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $products = product::find($id);

        // load the view and pass the nerds
        return view('product.show',compact('products'));
             
    }
public function showagain(Request $request)
    {
        $id=$request->input('id');
        $products = product::find($id);

        // load the view and pass the nerds
        //return view('book.show')
            //->with('books', $books);
            return view('product.show',compact('products'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $products = product::find($id);

        // load the view and pass the nerdss
   //     return view('book.edit')
     //       ->with('books', $books);
     return view('product.edit',compact('products'));   
    }

public function editagain(Request $request)
{
          $id=$request->input('id');
           $products = product::find($id);

        // load the view and pass the nerds
       // return view('book.edit')
         //   ->with('books', $books);
         return view('product.edit',compact('products'));  
  
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->input('id');

        $product = product::find($id);
        $pname=$request->input('pname');
        $pprice=$request->input('pprice');
        $pqty=$request->input('pqty');
        //$pname=$request->input('aname');
        $product->name=$pname;
        $file = $request->file('image');
        $extention=$file->getClientOriginalExtension();
        $fileName=time().'.'.$extention;
        $file->move('uploads/images/',$fileName);
       // $fileName =$image->
//Storage::put('upload/images/'.$fileName , file_get_contents($request->file('image')->getRealPath()));
$product->image=$fileName;
        $product->price=(int)$pprice;
        $product->qty=(int)$pqty;

        $product->save();
                return redirect('product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $id=$request->input('id');

       $products = product::find($id);
       $products->delete();
                       return redirect('product');


    }
    public function addtocart(Request $request)
    {
       $id=$request->input('p_id');
       $user_id=$request->input('u_id');
       $product =product::find($id);
       $cart=new cart;
       $cart->name=$product->name;
       $cart->image=$product->image;
       $cart->price=$product->price;
       $cart->user_id=$user_id;
       $cart->save();
       $product->qty=($product->qty)-1;
       $product->save();

        return redirect('userHome');
    }
   public function viwecarthistory(Request $request)
    {
        $userid=$request->input('u_id');
      $mycart=DB::table('cart')->where('user_id',$userid)->get();
         return view('product.viewcart',compact('mycart'));
    }
}
