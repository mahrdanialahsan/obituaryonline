<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subscriptions;
use App\User;

class AdminController extends Controller
{
    //
    public  function users(){

        $users   =   User::all();
        return view('admin.users',compact('users'));
    }
    //
    public  function subscriptions(){

        $subscriptions   =   Subscriptions::all();
        return view('admin.subscriptions',compact('subscriptions'));
    }

}
