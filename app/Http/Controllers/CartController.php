<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function index()
    {
        $products = Product::all();
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('Front.mycart',compact('cartitems','products'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }

        //ajax request from  products page addtocart ================================\\//
        public function addtocart(Request $request){
            $product_id = $request->input('prod_id');
            $product_qty = $request->input('prod_qty');
            $validator = Validator::make($request->all(),
                    [
                        'prod_qty'=> 'required|min:1|numeric',
                    ]);
                    if ($validator->fails())
                    {
                        return response()->json(['status'=>$validator->errors()->first()]);
                        // return redirect()->back()->with('status',$validator->errors()->first());
                    }
            if(Auth::check()){
                $prod_check = Product::where('id',$product_id)->first();
                if($prod_check){
                    if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                        return response()->json(['status'=>$prod_check->product_name . ' Already added to cart']);
                    }else{
                        $cart = new Cart();
                        $cart->prod_id =  $product_id;
                        $cart->prod_qty = $product_qty;
                        $cart->user_id = Auth::id();
                        $cart->save();
                        return response()->json(['status'=>$prod_check->product_name . ' Added to cart successfully']);
                    }
                }
            }else
            {
                return response()->json(['status'=>'Login to continue']);
            }
        }


         //ajax request from  my cart page delete item from cart ================================\\//
    public function delete_item(Request $request){
        $product_id = $request->input('prod_id');
        if(Auth::check()){
            if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists()){
                $cart = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                $cart->delete();
                return response()->json(['status'=>' product deleted successfully']);
            }
        }else{
            return response()->json(['status'=>'Login to continue']);
        }
    }
   // End ajax request from  my cart page delete item from cart ================================\\//

     // update quantity from my cart page by ajax ================================\\//
     public function update_qty(Request $request){
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        // $qty=Product::where('id',$product_id)->select('qty')->first();
        $validator = Validator::make($request->all(),
        [
            'prod_qty'=> 'required|numeric|min:1'
        ]);
        if ($validator->fails())
        {
            return response()->json(['status'=>$validator->errors()->first()]);
            // return redirect()->back()->with('status',$validator->errors()->first());
        }
        else{
            if(Auth::check()){
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    $cart = Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first();
                    $cart->prod_qty = $product_qty;
                    $cart->update();
                    return response()->json(['status'=>' Quantity updated successfully']);
                    // return redirect()->route('checkout.index')->with('status',"You can order now");
                }
            }
        }
     }
   // End update quantity from my cart page by ajax ================================\\//
}
