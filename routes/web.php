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
    Route::post('/campaign/{id}/update', 'CampaignController@update')->name('campaign.update');
});

Route::get('/donate', 'DonateController@index')->name('donate');


Route::get('/admin', function (){
    return redirect(route('admin.campaigns'));
})->name('admin');
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {
    Route::get('/subscriptions', 'Admin\AdminController@subscriptions')->name('admin.subscriptions');
    Route::get('/campaigns', 'Admin\CampaignController@index')->name('admin.campaigns');
    Route::get('/campaign/{id}', 'Admin\CampaignController@show')->name('admin.campaign.show');
    Route::get('/campaign/{id}/approve', 'Admin\CampaignController@approve')->name('admin.campaign.approve');
    Route::get('/campaign/{id}/reject', 'Admin\CampaignController@reject')->name('admin.campaign.reject');
});

Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');