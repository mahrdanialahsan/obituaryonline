<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/cache-clear', function (){
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
//    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
//    \Illuminate\Support\Facades\Artisan::call('route:cache');
    \Illuminate\Support\Facades\Artisan::call('view:cache');
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    dd('done');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
//    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/campaigns', 'CampaignController@index')->name('campaigns');
    Route::get('/campaign/create', 'CampaignController@create')->name('campaign.create');
    Route::post('/campaign', 'CampaignController@store')->name('campaign.store');
    Route::get('/campaign/{id}', 'CampaignController@show')->name('campaign.show');
    Route::get('/campaign/get/{id}', 'CampaignController@get')->name('campaign.get');
    Route::post('/campaign/{id}/update', 'CampaignController@update')->name('campaign.update');
    Route::post('/campaign/{id}/submit/approval', 'CampaignController@submitForApproval')->name('campaign.submit.approval');
});


Route::get('/campaign-details/{id}', 'CampaignController@details')->name('campaign.details');
Route::get('/donate', 'DonateController@index')->name('donate');
Route::get('/donate/{id}', 'DonateController@show')->name('donate.show');
Route::post('/filter-campaigns', 'DonateController@filter')->name('filter');


Route::get('/admin', function (){
    return redirect(route('admin.settings.site'));
})->name('admin');
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {


    Route::get('/settings/site', 'Admin\SiteController@index')->name('admin.settings.site');
    Route::post('/settings/store', 'Admin\SiteController@store')->name('admin.settings.save.site');


    Route::get('/settings/site/slider', 'Admin\SiteController@slider')->name('admin.settings.slider');
    Route::get('/settings/site/create', 'Admin\SiteController@createSlider')->name('admin.settings.slider.create');
    Route::post('/settings/site/store', 'Admin\SiteController@storeSlider')->name('admin.settings.slider.store');
    Route::get('/settings/site/{id}/edit', 'Admin\SiteController@editSlider')->name('admin.settings.slider.edit');
    Route::post('/settings/site/{id}/update', 'Admin\SiteController@updateSlider')->name('admin.settings.slider.update');
    Route::post('/settings/site/{id}/delete', 'Admin\SiteController@deleteSlider')->name('admin.settings.slider.delete');


    Route::get('/subscriptions', 'Admin\AdminController@subscriptions')->name('admin.subscriptions');
    Route::get('/campaigns', 'Admin\CampaignController@index')->name('admin.campaigns');
    Route::get('/campaign/{id}', 'Admin\CampaignController@show')->name('admin.campaign.show');
    Route::get('/campaign/{id}/approve', 'Admin\CampaignController@approve')->name('admin.campaign.approve');
    Route::get('/campaign/{id}/reject', 'Admin\CampaignController@reject')->name('admin.campaign.reject');



});

Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');