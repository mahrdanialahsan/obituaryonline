<?php

namespace App\Http\Controllers\Admin;

use App\ObituaryPayments;
use App\Obituaries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObituaryController extends Controller
{
    //
    public function index()
    {
        $obituaries   =   Obituaries::all();
        return view('admin.obituaries.index',compact('obituaries'));
    }
    public function show(Request $request, $id)
    {
        $obituary   =   Obituaries::find($id);
        $payments   =   ObituaryPayments::join('users','users.id','=','user_id')
                        ->selectRaw("obituary_payments.*,name as user_name")
                        ->where('obituary_id',$id)
                        ->get();
        return view('admin.obituaries.details',compact('obituary','payments'));
    }
    public function approve(Request $request, $uid)
    {
        $obituary   =   Obituaries::where('uid',$uid)->first();
        $obituary->status = 1;
        $obituary->save();
        return back()->with('success','Obituary approved successfully!');
    }
    public function reject(Request $request, $uid)
    {
        $obituary   =   Obituaries::where('uid',$uid)->first();
        $obituary->status = 1;
        $obituary->save();
        return back()->with('success','Obituary rejected successfully!');
    }
}
