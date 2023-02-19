<?php

namespace App\Http\Controllers;

use App\RelationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $childs =   RelationType::where('created_by',Auth::user()->id)->get();
        return  view("relation-type.list",compact('childs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $relationtype  =   null;
        return  view("relation-type.create",compact('relationtype'));
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
        $request->validate([
            'title'    =>  'required|string|max:255',
        ]);
        $relationtype = RelationType::whereIn('created_by',[0,Auth::user()->id])->where('title', 'like', $request->title)->count();
        if($relationtype > 0){
            return response()->json([
                'status'   =>   'error',
                'msg'      =>   'Relation Type  already exist.',
            ],200);
        }
        RelationType::create([
            'title'         =>  $request->title,
            'created_by'    =>  Auth::user()->id
        ]);
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('relation-type.list'),
            'msg'      =>  'Relation Type created successfully',
        ],200);
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
        $relationtype = RelationType::where('created_by',Auth::user()->id)->where('id',$id)->first();
        return  view("relation-type.create",compact('relationtype'));
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
        $request->validate([
            'title'    =>  'required|string|max:255'
        ]);
        $relationtype = RelationType::whereIn('created_by',[0,Auth::user()->id])->where('title', 'like', $request->title)->where('id','!=',$id)->count();
        if($relationtype > 0){
            return response()->json([
                'status'   =>   'error',
                'msg'      =>   'Relation Type  already exist.',
            ],200);
        }
        $relationtype               =   RelationType::where('created_by',Auth::user()->id)->where('id',$id)->first();
        $relationtype->title        =   $request->title;
        $relationtype->updated_by   =   Auth::user()->id;
        $relationtype->save();
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('relation-type.list'),
            'msg'      =>  'Relation Type updated successfully',
        ],200);
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
        $relationtype = RelationType::where('created_by',Auth::user()->id)->where('id',$id)->first();
        $relationtype->delete();
        return response()->json([
            'status'   =>   'success',
            'id'       =>   $id,
            'msg'      =>  'Child deleted successfully',
        ],200);
    }
}
