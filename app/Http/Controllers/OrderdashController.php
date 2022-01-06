<?php

namespace App\Http\Controllers;

use App\Models\Orderdash;
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
    public function store(Request $request)
    {
        return "hello";
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
