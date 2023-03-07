<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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
Route::get('/storage-link', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    dd('done');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/obituaries', 'HomeController@obituaries')->name('obituaries');
Route::get('/load-obituaries/{limit}/{offset}', 'HomeController@loadObituaries')->name('obituaries.load');
Route::group(['middleware' => ['auth']], function () {
//    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/myobituaries', 'ObituaryController@index')->name('myobituaries');
    Route::get('/obituary/create', 'ObituaryController@create')->name('obituary.create');
    Route::post('/obituary', 'ObituaryController@store')->name('obituary.store');
    Route::get('/obituary/{id}', 'ObituaryController@show')->name('obituary.show');
    Route::get('/obituary/get/{id}', 'ObituaryController@get')->name('obituary.get');
    Route::post('/obituary/{id}/update', 'ObituaryController@update')->name('obituary.update');
    Route::post('/obituary/{id}/submit/approval', 'ObituaryController@submitForApproval')->name('obituary.submit.approval');
    Route::get('/cart/checkout', 'AddToCartController@checkout')->name('cart.checkout');
});


Route::get('/obituary-details/{id}', 'ObituaryController@details')->name('obituary.details');
Route::get('/donate', 'DonateController@index')->name('donate');
Route::post('/filter-obituaries', 'DonateController@filter')->name('filter');


Route::get('/admin', function (){
    return redirect(route('admin.dashboard'));
})->name('admin');
Route::group(['prefix'=>'admin','middleware' => ['admin']], function () {


    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/users', 'Admin\AdminController@users')->name('admin.users');
    Route::get('/contributors', 'Admin\AdminController@contributors')->name('admin.contributors');
    Route::get('/contributor/{id}', 'Admin\AdminController@contributorDetails')->name('admin.contributor');
    Route::get('/subscriptions', 'Admin\AdminController@subscriptions')->name('admin.subscriptions');
    Route::get('/analysis', 'Admin\AdminController@getAnalysis')->name('admin.analysis');

    Route::get('/settings/site', 'Admin\SiteController@index')->name('admin.settings.site');
    Route::post('/settings/store', 'Admin\SiteController@store')->name('admin.settings.save.site');


    Route::get('/settings/site/slider', 'Admin\SiteController@slider')->name('admin.settings.slider');
    Route::get('/settings/site/create', 'Admin\SiteController@createSlider')->name('admin.settings.slider.create');
    Route::post('/settings/site/store', 'Admin\SiteController@storeSlider')->name('admin.settings.slider.store');
    Route::get('/settings/site/{id}/edit', 'Admin\SiteController@editSlider')->name('admin.settings.slider.edit');
    Route::post('/settings/site/{id}/update', 'Admin\SiteController@updateSlider')->name('admin.settings.slider.update');
    Route::post('/settings/site/{id}/delete', 'Admin\SiteController@deleteSlider')->name('admin.settings.slider.delete');



    Route::get('/payments', 'Admin\PaymentController@index')->name('admin.payments');
    Route::get('/payments/{id}', 'Admin\PaymentController@show')->name('admin.payments.show');

    Route::get('/obituaries', 'Admin\ObituaryController@index')->name('admin.obituaries');
    Route::get('/obituary/{id}', 'Admin\ObituaryController@show')->name('admin.obituary.show');
    Route::get('/obituary/{id}/approve', 'Admin\ObituaryController@approve')->name('admin.obituary.approve');
    Route::get('/obituary/{id}/reject', 'Admin\ObituaryController@reject')->name('admin.obituary.reject');



});

Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');


Route::get('/cart/donation', 'AddToCartController@index')->name('cart');
Route::post('/get-cart', 'AddToCartController@getCart')->name('cart.get');
Route::post('/add-to-cart/{uid}/amount/{amount}', 'AddToCartController@store')->name('cart.store');
Route::post('/empty-cart/{uid}', 'AddToCartController@destroy')->name('cart.empty');




Route::get('stripe', 'StripeCheckoutController@stripe');
Route::post('stripe', 'StripeCheckoutController@stripePost')->name('stripe.post');
