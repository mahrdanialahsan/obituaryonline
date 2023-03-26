<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RelationType;
use Illuminate\Http\Request;
use stdClass;
use Session;

class RelationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $relationtypes = RelationType::all();
        return view('admin.relationtypes.index',compact('relationtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $relationtype = new stdClass();
        if($relationtype){
            return view('admin.relationtypes.create',compact('relationtype'));
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
        if(RelationType::whereRaw(" title LIKE '{$request->title}' ")->first()){
            Session::flash('title', $request->title);
            return back()->with('error',"Title($request->title) Already Exist");
        }
        RelationType::create([
            "title"             =>  $request->title,
        ]);
        return redirect(route('admin.relationtypes'))->with('success','Relation added successfully!');
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
        $relationtype = RelationType::find($id);
        if($relationtype){
            return view('admin.relationtypes.create',compact('relationtype'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\relationtypes  $relationtypes
     * @return \Illuminate\Http\Response
     */
    public function edit(relationtypes $relationtypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\relationtypes  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(RelationType::whereRaw(" title LIKE '{$request->title}' ")->where('id','!=',$id)->first()){
            Session::flash('title', $request->title);
            return back()->with('error',"Title($request->title) Already Exist");
        }
        $relationtype                       =   RelationType::find($id);
        $relationtype->title                =   $request->title;
        $relationtype->save();
        return redirect(route('admin.relationtypes'))->with('success','Relation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\relationtypes  $relationtypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(relationtypes $relationtypes)
    {
        //
    }
}
