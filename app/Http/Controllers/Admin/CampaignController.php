<?php

namespace App\Http\Controllers\Admin;

use App\Campaigns;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //
    public function index()
    {
        $campaigns   =   Campaigns::all();
        return view('admin.campaigns.index',compact('campaigns'));
    }
    public function show(Request $request, $id)
    {
        $campaign   =   Campaigns::find($id);
        return view('admin.campaigns.details',compact('campaign'));
    }
    public function approve(Request $request, $uid)
    {
        $campaign   =   Campaigns::where('uid',$uid)->first();
        $campaign->status = 1;
        $campaign->save();
        return back()->with('success','Campaign approved successfully!');
    }
    public function reject(Request $request, $uid)
    {
        $campaign   =   Campaigns::where('uid',$uid)->first();
        $campaign->status = 1;
        $campaign->save();
        return back()->with('success','Campaign rejected successfully!');
    }
}
