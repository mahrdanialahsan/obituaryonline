<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\SiteSettings;
use App\Slider;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    function index(){
        $site =   SiteSettings::whereNotNull('id')->first();
        return view('admin.settings.index',compact('site'));
    }
    function store(Request $request){
//        dd($request->all());
        $site                                       =   SiteSettings::whereNotNull('id')->first();
        $site->site_title                           =   $request->site_title;
        $site->my_obituaries_title                   =   $request->my_obituaries_title;
        $site->home_page_menu_title                 =   $request->home_page_menu_title;
        $site->home_page_title_short_title          =   $request->home_page_title_short_title;
        $site->home_page_title_long_title           =   $request->home_page_title_long_title;
        $site->home_page_obituary_slider_title      =   $request->home_page_obituary_slider_title;
        $site->home_page_title_short_description    =   $request->home_page_title_short_description;
        $site->pure_heart_title                     =   $request->pure_heart_title;
        $site->pure_large_title                     =   $request->pure_large_title;
        $site->pure_small_description               =   $request->pure_small_description;
        $site->facebook_url                         =   $request->facebook_url;
        $site->twitter_url                          =   $request->twitter_url;
        $site->linkedin_url                         =   $request->twitter_url;
        $site->footer_rights                        =   $request->footer_rights;
        $site->donate_page_menu_title               =   $request->donate_page_menu_title;
        $site->donate_page_header_title             =   $request->donate_page_header_title;
        $site->obituary_page_menu_title            =   $request->obituary_page_menu_title;
        $site->obituary_page_header_title          =   $request->obituary_page_header_title;
        $site->obituary_page_obituary_title        =   $request->obituary_page_obituary_title;
        $site->obituary_page_form_title            =   $request->obituary_page_form_title;
        $site->signup_page_menu_title               =   $request->signup_page_menu_title;
        $site->signup_page_cover_title              =   $request->signup_page_cover_title;
        $site->login_page_menu_title                =   $request->login_page_menu_title;
        $site->login_page_cover_title               =   $request->login_page_cover_title;

        if($request->hasFile('site_logo')){
            $fileName          =   'site_logo_' . time() . '.'. $request->site_logo->extension();
            $request->site_logo->move(storage_path('app/public/site_settings'), $fileName);
            $site->site_logo     =  $fileName;
        }
        if($request->hasFile('fav_icon')){
            $fileName          =   'fav_icon_' . time() . '.'. $request->fav_icon->extension();
            $request->fav_icon->move(storage_path('app/public/site_settings'), $fileName);
            $site->fav_icon    =  $fileName;
        }
        if($request->hasFile('donate_page_cover_image')){
            $fileName          =   'donate_page_cover_image_' . time() . '.'. $request->donate_page_cover_image->extension();
            $request->donate_page_cover_image->move(storage_path('app/public/site_settings'), $fileName);
            $site->donate_page_cover_image     =  $fileName;
        }
        if($request->hasFile('obituary_page_cover_image')){
            $fileName          =   'obituary_page_cover_image_' . time() . '.'. $request->obituary_page_cover_image->extension();
            $request->obituary_page_cover_image->move(storage_path('app/public/site_settings'), $fileName);
            $site->obituary_page_cover_image     =  $fileName;
        }


        if($request->hasFile('signup_page_cover_image')){
            $fileName          =   'signup_page_cover_image' . time() . '.'. $request->signup_page_cover_image->extension();
            $request->signup_page_cover_image->move(storage_path('app/public/site_settings'), $fileName);
            $site->signup_page_cover_image     =  $fileName;
        }

        if($request->hasFile('login_page_cover_image')){
            $fileName          =   'login_page_cover_image' . time() . '.'. $request->login_page_cover_image->extension();
            $request->login_page_cover_image->move(storage_path('app/public/site_settings'), $fileName);
            $site->login_page_cover_image     =  $fileName;
        }



        $site->save();
        return back()->with('success','Setting updated successfully!');
    }

    /*
     *
     * Slider
     *
     *
     */
    public function slider(){
        $sliders =   Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function createSlider(){
        $slider =   null;
        return view('admin.slider.create',compact('slider'));
    }
    public function storeSlider(Request $request){
        $slider                     =   new Slider();
        $slider->small_title        =   $request->small_title;
        $slider->big_title          =   $request->big_title;
        $slider->description        =   $request->description;
        $slider->allow_donate_button=   (int)$request->allow_donate_button;
        $slider->displayorder       =   (int)$request->displayorder;
        $slider->status             =   (int)$request->status;
        if($request->hasFile('image')){
            $fileName               =   'slider-' . time() . '.'. $request->image->extension();
            $request->image->move(storage_path('app/public/slider'), $fileName);
            $slider->image     =  $fileName;
        }
        $slider->save();
        return redirect(route('admin.settings.slider'))->with('success','Slider saved successfully!');
    }
    public function editSlider($id){
        $slider =   Slider::find($id);
        return view('admin.slider.create',compact('slider'));
    }
    public function updateSlider(Request $request,$id){
        $slider                     =   Slider::find($id);
        $slider->small_title        =   $request->small_title;
        $slider->big_title          =   $request->big_title;
        $slider->description        =   $request->description;
        $slider->allow_donate_button=   $request->allow_donate_button;
        $slider->displayorder       =   $request->displayorder;
        $slider->status             =   $request->status;
        if($request->hasFile('image')){
            $fileName               =   'slider-' . time() . '.'. $request->image->extension();
            $request->image->move(storage_path('app/public/slider'), $fileName);
            $slider->image     =  $fileName;
        }
        $slider->save();
        return redirect(route('admin.settings.slider'))->with('success','Slider updated successfully!');
    }
    public function deleteSlider(Request $request,$id){
        $slider                     =   Slider::find($id);
        $slider->delete();
        return redirect(route('admin.settings.slider'))->with('success','Slider deleted successfully!');
    }

}
