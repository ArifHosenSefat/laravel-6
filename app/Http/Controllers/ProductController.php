<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  function product(){
    $products = Product::all();
     return view('product/index', compact('products'));
    //  (use / or .)
    //  echo "ok";n
  }
  function productinsert(Request $request){
    $request->validate([
      'product_name'=> 'required|alpha',
      'product_price'=> 'required | numeric',
      'product_quantity'=> 'required | numeric',
      'alert_quantity'=> 'required | numeric',
      
    ],
    [
      'product_name.required' => 'প্রোডাক্ট নাম কই ??',
      'product_name.alpha' => 'Amne likhsen ken',
      'product_price.required' => 'Product Price nai',
    ]
  );
   Product::insert([
              'product_name'=>$request->product_name,
              'product_price'=>$request->product_price,
              'product_quantity'=>$request->product_quantity,
              'alert_quantity'=>$request->alert_quantity,
              'created_at' =>Carbon::now()

  ]);
  return back()->with('status','Product Inserted Successfully');
  }

function productdelete($product_id){
  // echo $product_id;
 $product_name = product::findOrFail ($product_id)->product_name;
  product::findOrFail ($product_id)->delete();
  // return back()->with('delete_status','Product Deleted Successfully');
  return back()->withDelete_status($product_name.' Deleted Successfully');;
}













}
