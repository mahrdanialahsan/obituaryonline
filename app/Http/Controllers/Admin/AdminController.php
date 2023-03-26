<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Obituaries;
use App\ObituaryPayments;
use App\Payments;
use App\Subscriptions;
use App\User;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    //
    public  function index(){
        $payments = Obituaries::whereRaw(" status = 1 AND total_donation > total_paid")->get();
        return view('admin.dashboard',compact('payments'));
    }
    public  function getAnalysis(){
        $today = date('Y-m-d');
       //Today Payments
        $data['today_payments'] =   Payments::whereRaw("DATE(created_at) = '$today'")->sum('amount');
        $data['total_payments'] =   Payments::sum('amount');
       //Total Payments


        //Today Contributors
        $data['today_contributors'] =   Payments::whereRaw("DATE(created_at) = '$today'")->distinct('user_id')->count('user_id');
        $data['total_contributors'] =   Payments::distinct('user_id')->count('user_id');
        //Total Contributors


        //Today Users
        $data['today_users'] =   User::whereRaw("DATE(created_at) = '$today'")->count();
        $data['total_users'] =   User::count();
        //Total Users



        //Today obituaries
        $data['today_obituaries'] =   Obituaries::whereRaw("DATE(created_at) = '$today'")->count();
        $data['total_obituaries'] =   Obituaries::count();



        $data['total_service_charges']      =   ObituaryPayments::where('status','in')->sum('service_charges_amount');
        $data['total_released_payments']    =   ObituaryPayments::where('status','out')->sum('amount');
        $data['pending_released_payments']  =   ObituaryPayments::where('status','in')->sum('amount')-$data['total_released_payments'];
        $data['pending_released_obituaries']=   Obituaries::whereRaw(" status = 1 AND total_donation > total_paid")->count();



        $last30day = Carbon::now()->subDay(30)->format('Y-m-d');
        $last_30_days =   DB::select("SELECT 
                                                    sum(amount) as total_amount,
                                                    DATE(created_at) as date_name
                                                FROM payments
                                                WHERE DATE(created_at) BETWEEN  '$last30day' AND '$today'
                                                GROUP BY DATE(created_at)
                                                ORDER BY DATE(created_at)
                                     ");

        for ($i = 0; $i <= 14; $i++) {
            $day = Carbon::now()->subDay($i)->format('Y-m-d');
            $data['last_30_days'][] =   [
                'day'       =>  date('M-d',strtotime($day)),
                'amount'    =>  collect($last_30_days)->where('date_name',$day)->sum('total_amount')
            ];
        }

        $last12month   =   Carbon::now()->subMonths(12)->format('Y-m-01');
        $last_12_month =   DB::select("SELECT 
                                                    sum(amount) as total_amount,
                                                    DATE_FORMAT(created_at, '%Y-%m') as month_name
                                                FROM payments
                                                WHERE DATE(created_at) BETWEEN  '$last12month' AND '$today' 
                                                GROUP BY YEAR(created_at),MONTH(created_at)
                                                ORDER BY DATE(created_at)
                                                ");

        for ($i = 0; $i < 11; $i++) {
            $month = Carbon::now()->subMonths($i)->format('Y-m');
            $data['last_12_month'][] =   [
                'month'     =>  date('M y',strtotime($month."-01")),
                'amount'    =>  collect($last_12_month)->where('month_name',$month)->sum('total_amount')
            ];
        }
        //Total obituaries
        return response()->json([
           'status' => 'success',
           'data'   =>  $data
        ]);
    }

    public  function users(){

        $users   =   User::all();
        return view('admin.users',compact('users'));
    }
    //
    public  function subscriptions(){

        $subscriptions   =   Subscriptions::all();
        return view('admin.subscriptions',compact('subscriptions'));
    }
    public  function contributors(){

        $users   =   DB::select("
        SELECT 
        users.id,
        users.name,
        users.email,
        SUM(payments.amount) as total_amount
        FROM users
        JOIN payments ON payments.user_id = users.id
        GROUP BY users.id
        ORDER BY payments.id DESC
        ");
        return view('admin.contributors.index',compact('users'));
    }
    public function contributorDetails($id){
        $user    =   User::find($id);
        $payments   =   ObituaryPayments::join('obituaries','obituaries.id','=','obituary_id')
                            ->selectRaw("obituary_payments.*,obituaries.deceased_first_name,obituaries.deceased_last_name,obituaries.uid")
                            ->where('user_id',$id)
                            ->get();
        return  view('admin.contributors.details',compact('user','payments'));
    }



}
