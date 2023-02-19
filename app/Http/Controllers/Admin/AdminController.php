<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriptions;

class AdminController extends Controller
{
    //
    public  function subscriptions(){

        $subscriptions   =   Subscriptions::all();
        return view('admin.subscriptions',compact('subscriptions'));
    }

}
