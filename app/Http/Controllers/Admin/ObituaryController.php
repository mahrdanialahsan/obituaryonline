<?php

namespace App\Http\Controllers\Admin;

use App\ObituaryPayments;
use App\Obituaries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObituaryController extends Controller
{
    //
    public function index()
    {
        $obituaries   =   Obituaries::all();
        return view('admin.obituaries.index',compact('obituaries'));
    }
    public function show($id)
    {
        $obituary   =   Obituaries::find($id);
        if($obituary){
            $payments   =   ObituaryPayments::join('users','users.id','=','user_id')
                ->selectRaw("obituary_payments.*,name as user_name")
                ->where('obituary_id',$id)
                ->where('obituary_payments.status','in')
                ->get();
            $releasedpayments   =   ObituaryPayments::where('obituary_id',$id)
                                            ->where('obituary_payments.status','out')
                                            ->get();
            return view('admin.obituaries.details',compact('obituary','payments','releasedpayments'));
        }else{
            return abort(404);
        }
    }
    public function pay($id)
    {
        $obituary   =   Obituaries::find($id);
        if($obituary){
            $payments   =   ObituaryPayments::where('obituary_id',$id)->get();
            return view('admin.obituaries.pay',compact('obituary','payments'));
        }else{
            return abort(404);
        }
    }
    public function paid(Request $request,$id)
    {
        $obituary   =   Obituaries::find($id);
        if($obituary){
            if(!$request->has('amount') || (float)$request->amount <= 0){
                Session::flash('amount', $request->amount);
                return back()->with('error',"Invalid is missing");
            }
            $pendingAmount = round($obituary->total_donation - $obituary->total_paid,2);
            if($request->amount > $pendingAmount){
                return back()->with('error',"Released Amount should be less than or equal to pending donation amount.");
            }
            if(!$request->hasFile('payment_recipt')){
                return back()->with('error',"Payment Invoice Screenshot is missing");
            }
            $payment_recipt          =   'image_' . time() . '.'. $request->payment_recipt->extension();
            $request->payment_recipt->move(storage_path('app/public/payment_recipt'), $payment_recipt);
            ObituaryPayments::insertGetId([
                'user_id'               =>  Auth::user()->id,
                'payment_id'            =>  0,
                'obituary_id'           =>  $obituary->id,
                'donar_amount'          =>  0,
                'service_charges'       =>  0,
                'service_charges_amount'=>  0,
                'amount'                =>  $request->amount,
                'status'                =>  'out',
                'currency'              =>  'usd',
                'payment_recipt'        =>  $payment_recipt,
                'created_at'            =>  date("Y-m-d H:i:s"),
            ]);
            $obituary->total_paid       =   $obituary->total_paid+$request->amount;
            $obituary->save();
            return back()->with('success',"Release Payment details updated successfully.");
        }else{
            return abort(404);
        }
    }
    public function approve($uid)
    {
        $obituary   =   Obituaries::where('uid',$uid)->first();
        if($obituary) {
            $obituary->status = 1;
            $obituary->save();
            return back()->with('success', 'Obituary approved successfully!');
        }
        return back()->with('success', 'invalid operation!');
    }
    public function reject($uid)
    {
        $obituary   =   Obituaries::where('uid',$uid)->first();
        if($obituary) {
            $obituary->status = 1;
            $obituary->save();
            return back()->with('success', 'Obituary rejected successfully!');
        }
        return back()->with('success', 'invalid operation!');
    }
}
