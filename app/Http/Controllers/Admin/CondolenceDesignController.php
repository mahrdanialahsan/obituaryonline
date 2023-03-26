<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CondolenceDesign;
use App\Http\Traits\CommonTrait;
use Illuminate\Http\Request;
use stdClass;
use Session;

class CondolenceDesignController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $designs = CondolenceDesign::all();
        return view('admin.designs.index',compact('designs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $design = new stdClass();
        if($design){
            return view('admin.designs.create',compact('design'));
        }
        else{
            return abort(404);
        }
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
        $image                =   null;
        if(CondolenceDesign::whereRaw(" title LIKE '{$request->title}' ")->first()){
            Session::flash('title', $request->title);
            return back()->with('error',"Title($request->title) Already Exist");
        }
        if($request->hasFile('image')){
            $image          =   'image_' . time() . '.'. $request->image->extension();
            if(!$this->uploadImage($request,'image',320,400,'designs/'.$image)){
                $request->image->move(storage_path('app/public/designs'), $image);
            }
        }
        CondolenceDesign::create([
            "title"             =>  $request->title,
            "image"             =>  $image,
            "description"       =>  "Test"
        ]);
        return redirect(route('admin.designs'))->with('success','Blog added successfully!');
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
        $design = CondolenceDesign::find($id);
        if($design){
            return view('admin.designs.create',compact('design'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\designs  $designs
     * @return \Illuminate\Http\Response
     */
    public function edit(designs $designs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\designs  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(CondolenceDesign::whereRaw(" title LIKE '{$request->title}' ")->where('id','!=',$id)->first()){
            Session::flash('title', $request->title);
            return back()->with('error',"Title($request->title) Already Exist");
        }
        $design                       =   CondolenceDesign::find($id);
        $design->title                =   $request->title;
        if($request->hasFile('image')){
            $fileName          =   'image_' . time() . '.'. $request->image->extension();
            if(!$this->uploadImage($request,'image',570,420,'designs/'.$fileName)){
                $request->image->move(storage_path('app/public/designs'), $fileName);
            }
            $design->image      =   $fileName;
        }
        $design->description          =   "Test";
        $design->save();
        return redirect(route('admin.designs'))->with('success','updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\designs  $designs
     * @return \Illuminate\Http\Response
     */
    public function destroy(designs $designs)
    {
        //
    }
}
