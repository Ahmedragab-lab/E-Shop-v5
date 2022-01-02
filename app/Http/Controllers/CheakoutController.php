<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CheakoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartitems= Cart::where('user_id',Auth::id())->get();
        return view('Front.checkout',compact('cartitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try
        {
                $validator = Validator::make($request->all(),
                [
                    'phone'    => 'required|min:11|numeric',
                    'address' => 'required|min:3|max:20|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
                    'city'     => 'required|min:3|max:20|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
                    'country'  => 'required|min:3|max:20|regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/',
                ]);
                if ($validator->fails())
                {
                    return redirect()->back()->with('status',$validator->errors()->first());
                }
                // valiadtion
                // if(Auth::user()->address1 == NULL){
                //     $user = User::where('id',Auth::id())->first();
                //     $user->fname = $request->fname;
                //     $user->lname = $request->lname;
                //     $user->phone = $request->phone;
                //     $user->address1 = $request->address1;
                //     $user->address2 = $request->address2;
                //     $user->city = $request->city;
                //     $user->country = $request->country;
                //     $user->update();
                // }
                $order = new Order();
                // $order->order_id = Auth::id();
                $order->fname = $request->fname;
                $order->lname = $request->lname;
                $order->email = $request->email;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->country = $request->country;
                $order->city = $request->city;
                $order->save();
                $cartitems= Cart::where('user_id',Auth::id())->get();
                foreach($cartitems as $item){
                    OrderItem::create([
                        'order_id'=> $order->id,
                        'prod_id'=> $item->prod_id,
                        'qty'=> $item->prod_qty,
                        'price'=> $item->product->selling_price,
                        'priceqty'=>$item->sum,
                        'priceqtytax'=>$item->tax,
                        'total'=>$item->sum + $item->tax,
                    ]);
                    $product = Product::where('id',$item->prod_id)->first();
                    $product->qty = $product->qty - $item->prod_qty;
                    $product->update();
                }
                $cartitems= Cart::where('user_id',Auth::id())->get();
                Cart::destroy($cartitems);
                DB::commit();
                return redirect()->route('mycart.index')->with('status',"your order done");
            // }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
