<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSection;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::orderByDesc('id')->get();
        return view('Admin.section.index',compact('sections'));
    }

    public function create()
    {
        return view('Admin.section.create');
    }


    public function store(StoreSection $request)
    {
        try {
            $validated = $request->validated();
            $section = new Section();
            if($request->hasfile('image')){
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/section/', $filename);
                $section->image = $filename;
            }
            $section->section_name = $request->section_name;
            $section->slug = $request->slug;
            $section->desc = $request->desc;
            $section->status = $request->status==true?'1':'0';
            $section->popular = $request->popular==true?'1':'0';
            $section->save();
            toastr()->success(__('section create successfully'));
            return redirect()->route('sections.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    public function edit($id)
    {
        $section=Section::findorfail($id);
        return view('Admin.section.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSection $request,$id)
    {

        try {
            $validated = $request->validated();

            $section = Section::findorfail($id);
            if($request->hasfile('image')){
                $path = 'uploads/section/' . $section->image;
                if(File::exists($path)){
                    File::delete($path);
                }
                $file = $request->file('image');
                $ext  = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/section/', $filename);
                $section->image = $filename;
            }
            $section->section_name = $request->section_name;
            $section->slug = $request->slug;
            $section->desc = $request->desc;
            $section->status = $request->status==true?'1':'0';
            $section->popular = $request->popular==true?'1':'0';
            $section->update();
            toastr()->success(__('section update successfully'));
            return redirect()->route('sections.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
    try{
        $section = Section::findorfail($id);
        if($section->image){
            $path = 'uploads/section/' . $section->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $section->delete();
        toastr()->error(__('section delete successfully'));
        return redirect()->route('sections.index');
    }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
