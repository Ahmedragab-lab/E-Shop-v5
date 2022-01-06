<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderByDesc('id')->get();
        return view('Admin.client.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.client.create',);
    }

     public function store(Request $request)
    {
        try {
            // $validated = $request->validated();
            $client = new Client();
            if($request->hasfile('image')){
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/client/', $filename);
                $client->image = $filename;
            }
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->save();
            toastr()->success(__('client create successfully'));
            return redirect()->route('clients.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $client=Client::findorfail($id);
        // $sections = Section::with('products')->get();
        // dd($sections);
        return view('Admin.client.order',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Client::findorfail($id);
        return view('Admin.client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // $validated = $request->validated();

            $client=Client::findorfail($id);
            if($request->hasfile('image')){
                $path = 'uploads/client/' . $client->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/client/', $filename);
                $client->image = $filename;
            }
            $client->name = $request->name;
            $client->phone = $request->phone;
            $client->address = $request->address;
            $client->update();
            toastr()->success(__('client update successfully'));
            return redirect()->route('clients.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $client=Client::findorfail($id);
            if($client->image){
                $path = 'uploads/client/' . $client->image;
                if(File::exists($path)){
                    File::delete($path);
                }
            }
            $client->delete();
            toastr()->error(__('section delete successfully'));
            return redirect()->route('clients.index');
        }catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    }

