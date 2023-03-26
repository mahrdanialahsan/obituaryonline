<?php

namespace App\Http\Controllers;

use App\Memories;
use Illuminate\Http\Request;

class MemoriesController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'obituary_id'       => 'required',
            'design_id'         => 'required',
            //'image'             => 'required',
            'wishes'            => 'required|string',
        ]);
        $memory                 =   new Memories();
        $memory->obituary_id    =   $request->obituary_id;
        $memory->design_id      =   $request->design_id;
        if($request->hasFile('image')){
            $fileName          =   'image_' . time() . '.'. $request->image->extension();
            $request->image->move(storage_path('app/public/memories'), $fileName);
            $memory->image      =   $fileName;
        }
        $memory->youtube_link   =   $request->youtube_link;
        $memory->wishes         =   $request->wishes;
        $memory->save();
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('obituary.details',['id'=>$request->uid]),
            'msg'      => 'Memory created successfully.',
        ],200);

    }
}
