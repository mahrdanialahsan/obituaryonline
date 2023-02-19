<?php

namespace App\Http\Controllers;

use App\Campaigns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('campaign.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uid = Str::random(150);
        $request->validate([
            //'uid'               => 'required|string|uid|unique:campaigns',
            'deceased_name'     => 'required|string|max:255',
            'date_of_birth'     => 'required|date|date_format:Y-m-d',
            'date_of_death'     => 'required|date|date_format:Y-m-d H:i',
            'wake_location'     => 'required|string|max:255',
            'wake_period'       => 'required|integer',
            'funeral_date'      => 'required|date|date_format:Y-m-d H:i',
            'funeral_location'  => 'required|string|max:255',
            'surviving_family'  => 'required|string|max:255',
            //'deceased_picture'  => 'required|image','mimes:jpeg,png,jpg,gif',
            'deceased_picture'  => 'required',
            'death_certificate' => 'required|mimes:pdf',
            'message'           => 'required|string',
        ]);
        //dd($request->all());
        $dpfileName          =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->deceased_picture->extension();
        $request->deceased_picture->move(storage_path('app/public/deceased_picture'), $dpfileName);
        $dcfileName         =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->death_certificate->extension();
        $request->death_certificate->move(storage_path('app/public/death_certificate'), $dcfileName);
        $data                       =   $request->except(['deceased_picture','death_certificate']);
        $data['deceased_picture']   =   $dpfileName;
        $data['death_certificate']   =   $dpfileName;
        $data['uid']                =   $uid;
        $data['created_by']         =   auth()->id();
        $compaign = new Campaigns($data);
        $compaign->save();
        //dd(route('campaign.show',['id'=>$compaign->uid]));
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('campaign.show',['id'=>$compaign->uid]),
            'msg'      =>  'Compaign created successfully.',
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$uid)
    {
        $campaigns =   Campaigns::where('uid',$uid)->first();
        if($request->ajax()){
           return response()->json(Campaigns::where('uid',$uid)->first());
        }else{
            return view('campaign.create',compact('uid','campaigns'));
        }
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
    public function update(Request $request, $uid)
    {
        //
        $request->validate([
            //'uid'               => 'required|string|uid|unique:campaigns',
            'deceased_name'     => 'required|string|max:255',
            'date_of_birth'     => 'required|date|date_format:Y-m-d',
            'date_of_death'     => 'required|date|date_format:Y-m-d H:i',
            'wake_location'     => 'required|string|max:255',
            'wake_period'       => 'required|integer',
            'funeral_date'      => 'required|date|date_format:Y-m-d H:i',
            'funeral_location'  => 'required|string|max:255',
            'surviving_family'  => 'required|string|max:255',
            'message'           => 'required|string',
        ]);
        $compaign                   =  Campaigns::where('uid',$uid)->first();
        $compaign->deceased_name    =  $request->deceased_name;
        $compaign->date_of_birth    =  $request->date_of_birth;
        $compaign->date_of_death    =  $request->date_of_death;
        $compaign->wake_location    =  $request->wake_location;
        $compaign->wake_period      =  $request->wake_period;
        $compaign->funeral_date     =  $request->funeral_date;
        $compaign->funeral_location =  $request->funeral_location;
        $compaign->surviving_family =  $request->surviving_family;
        $compaign->message          =  $request->message;
        if($request->hasFile('deceased_picture')){
            $dpfileName          =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->deceased_picture->extension();
            $request->deceased_picture->move(storage_path('app/public/deceased_picture'), $dpfileName);
            $compaign->deceased_picture     =  $dpfileName;
        }
        if($request->hasFile('death_certificate')){
            $dcfileName         =   auth()->id() . '_' . str_replace(' ','-', $request->deceased_name) . '_' . time() . '.'. $request->death_certificate->extension();
            $request->death_certificate->move(storage_path('app/public/death_certificate'), $dcfileName);
            $compaign->death_certificate    =  $dcfileName;
        }
        $compaign->updated_at         =   date('Y-m-d H:i:s');
        $compaign->save();
        return response()->json([
            'status'   => 'redirect',
            'url'      =>  route('campaign.show',['id'=>$compaign->uid]),
            'msg'      =>  'Compaign updated successfully.',
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
    }
}
