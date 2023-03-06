<?php

namespace App\Http\Controllers;

use App\Obituaries;
use App\Slider;
use App\Subscriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->is_admin == 1){
            return  redirect(route('admin'));
        }
        else{
            $todayobituaries =    Obituaries::where('status',1)->orderBy('id','DESC')->take(3)->get();
            $obituaries      =    Obituaries::where('status',1)->get();
            $sliders         =    Slider::where('status',1)->orderBy('displayorder')->get();
            return view('home',compact('todayobituaries','obituaries','sliders'));
        }
    }

    public function obituaries()
    {
        return view('obituaries');
    }

    public function loadObituaries($limit,$offset)
    {
        $total           =    Obituaries::where('status',1)->count();
        $obituaries      =    Obituaries::where('status',1)->skip($offset)->take($limit)->get();
        return response()->json([
            'status'   => 'success',
            'data'     =>   [
                'total'      => $total,
                'count'      => collect($obituaries)->count(),
                'obituaries' => $obituaries,
            ]
        ],200);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function subscribe(Request $request){
        $request->validate([
            'email'               => 'required|email|unique:subscriptions',
        ],
            [
                'required' => 'Enter Valid email address',
                'unique' => 'You are already subscribed.',
            ]
        );
        $subscribe = new Subscriptions();
        $subscribe->email = $request->email;
        $subscribe->save();
        return response()->json([
            'status'   => 'success',
            'msg'      =>  'You are successfully subscribed.'
        ],200);
    }
}
