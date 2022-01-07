<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Orderdash;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderdashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request , $id)
    {
        // dd($id);
        // dd($request->all());
        $request->validate([
            'products'=>'required|array',
            'q'=>'required|array',
        ]);
        // $order = Orderdash::create([]);
        $client = Client::findorfail($id);
        $order = $client->orders()->create([]);   // create order in orderdash table client and total
        $total = 0;

        foreach( $request->products as $index=>$product_id){
            $product = Product::findorfail($product_id);
            $order->products()->attach($product,['quantity'=>$request->q[$index]]);  // create order qty in product_order pivot table
            $total += $product->selling_price * $request->q[$index];
        } //end foreach

        $product->update([
            'qty'=>$product->qty - $request->q[$index] ,
        ]);

        $order->update([
            'total'=>$total ,
        ]);

        toastr()->success(__('order done successfully'));
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orderdash  $orderdash
     * @return \Illuminate\Http\Response
     */
    public function show(Orderdash $orderdash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orderdash  $orderdash
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderdash $orderdash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orderdash  $orderdash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderdash $orderdash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orderdash  $orderdash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orderdash $orderdash)
    {
        //
    }
}
