<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Pages;
use Illuminate\Http\Request;
use stdClass;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Pages::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page = new stdClass();
        if($page){
            return view('admin.pages.create',compact('page'));
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
        $thumbnail_image                =   null;
        $cover_image                    =   null;
        if($request->hasFile('thumbnail_image')){
            $thumbnail_image          =   'thumbnail_image_' . time() . '.'. $request->thumbnail_image->extension();
            $request->thumbnail_image->move(storage_path('app/public/pages'), $thumbnail_image);
        }
        if($request->hasFile('cover_image')){
            $cover_image          =   'cover_image_' . time() . '.'. $request->cover_image->extension();
            $request->cover_image->move(storage_path('app/public/pages'), $cover_image);
        }
        Pages::create([
            "title"             =>  $request->title,
            "slug"              =>  Str::slug($request->title),
            "type"              =>  'blog',
            "thumbnail_image"   =>  $thumbnail_image,
            "cover_image"       =>  $cover_image,
            "short_description" =>  $request->short_description,
            "description"       =>  $request->description
        ]);
        return redirect(route('admin.pages'))->with('success','Blog added successfully!');
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
        $page = Pages::find($id);
        if($page){
            return view('admin.pages.create',compact('page'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit(Pages $pages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pages  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $page                       =   Pages::find($id);
        $page->title                =   $request->title;
        if($request->hasFile('thumbnail_image')){
            $fileName          =   'thumbnail_image_' . time() . '.'. $request->thumbnail_image->extension();
            $request->thumbnail_image->move(storage_path('app/public/pages'), $fileName);
            $page->thumbnail_image      =   $fileName;
        }
        if($request->hasFile('cover_image')){
            $fileName          =   'cover_image_' . time() . '.'. $request->cover_image->extension();
            $request->cover_image->move(storage_path('app/public/pages'), $fileName);
            $page->cover_image      =   $fileName;
        }
        $page->short_description    =   $request->short_description ? $request->short_description:null;
        $page->description          =   $request->description;
        $page->save();
        return redirect(route('admin.pages'))->with('success','updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pages $pages)
    {
        //
    }
}
