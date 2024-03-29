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
Route::get('/optimize', function (){
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    //\Illuminate\Support\Facades\Artisan::call('optimize:clear');
    dd('done');
});
Route::get('/storage-link', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    dd('done');
});
Route::get('/dump-autoload', function (){
    system('php /opt/cpanel/composer/bin/composer dump-autoload');
    dd('done');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/obituaries', 'HomeController@obituaries')->name('obituaries');
Route::get('/obituaries', function (){
    return redirect(route('donate'));
})->name('obituaries');
Route::get('/load-obituaries/{limit}/{offset}', 'HomeController@loadObituaries')->name('obituaries.load');


Route::get('auth/facebook', 'FacebookController@redirectToFacebook')->name('facebook-login');
Route::get('auth/facebook/callback','FacebookController@handleFacebookCallback')->name('facebook-callback');


Route::group(['middleware' => ['auth']], function () {
//    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mine', 'ObituaryController@index')->name('mine');
    Route::get('/obituary/{id}/payments', 'ObituaryController@payments')->name('obituary.payments');
    Route::get('/obituary/create', 'ObituaryController@create')->name('obituary.create');
    Route::post('/obituary', 'ObituaryController@store')->name('obituary.store');
    Route::get('/obituary/{id}', 'ObituaryController@show')->name('obituary.show');
    Route::get('/obituary/get/{id}', 'ObituaryController@get')->name('obituary.get');
    Route::post('/obituary/{id}/update', 'ObituaryController@update')->name('obituary.update');
    Route::post('/obituary/{id}/submit/approval', 'ObituaryController@submitForApproval')->name('obituary.submit.approval');
    Route::get('/cart/checkout', 'AddToCartController@checkout')->name('cart.checkout');
});


Route::get('/obituary-details/{id}', 'ObituaryController@details')->name('obituary.details');
Route::get('/archives', 'DonateController@index')->name('donate');
Route::get('/search', 'DonateController@index')->name('search');
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


    Route::get('/obituary/{id}/pay', 'Admin\ObituaryController@pay')->name('admin.obituary.pay');
    Route::post('/obituary/{id}/paid', 'Admin\ObituaryController@paid')->name('admin.obituary.paid');


    Route::get('/pages', 'Admin\PagesController@index')->name('admin.pages');
    Route::get('/page/create', 'Admin\PagesController@create')->name('admin.page.create');
    Route::post('/page/store', 'Admin\PagesController@store')->name('admin.page.store');
    Route::get('/page/{id}/edit', 'Admin\PagesController@show')->name('admin.page.show');
    Route::post('/page/{id}/update', 'Admin\PagesController@update')->name('admin.page.update');
    Route::get('/page/{id}/delete', 'Admin\PagesController@show')->name('admin.page.delete');


    Route::get('/designs', 'Admin\CondolenceDesignController@index')->name('admin.designs');
    Route::get('/design/create', 'Admin\CondolenceDesignController@create')->name('admin.design.create');
    Route::post('/design/store', 'Admin\CondolenceDesignController@store')->name('admin.design.store');
    Route::get('/design/{id}/edit', 'Admin\CondolenceDesignController@show')->name('admin.design.show');
    Route::post('/design/{id}/update', 'Admin\CondolenceDesignController@update')->name('admin.design.update');
    Route::get('/design/{id}/delete', 'Admin\CondolenceDesignController@show')->name('admin.design.delete');



    Route::get('/relationtypes', 'Admin\RelationTypeController@index')->name('admin.relationtypes');
    Route::get('/relationtype/create', 'Admin\RelationTypeController@create')->name('admin.relationtype.create');
    Route::post('/relationtype/store', 'Admin\RelationTypeController@store')->name('admin.relationtype.store');
    Route::get('/relationtype/{id}/edit', 'Admin\RelationTypeController@show')->name('admin.relationtype.show');
    Route::post('/relationtype/{id}/update', 'Admin\RelationTypeController@update')->name('admin.relationtype.update');
    Route::get('/relationtype/{id}/delete', 'Admin\RelationTypeController@show')->name('admin.relationtype.delete');



});

Route::get('/get-relation-types', 'HomeController@getRelationTypes')->name('get-relation-types');
Route::get('/learn', 'HomeController@learn')->name('learn');
Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
Route::get('/contact-us', 'HomeController@contactUs')->name('contact-us');
Route::get('/blogs', 'HomeController@blogs')->name('blogs');
Route::get('/blog/{slug}', 'HomeController@blog')->name('blog');
Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');
Route::post('/memory/store', 'MemoriesController@store')->name('memory.store');


Route::get('/cart/donation', 'AddToCartController@index')->name('cart');
Route::post('/get-cart', 'AddToCartController@getCart')->name('cart.get');
Route::post('/add-to-cart/{uid}/amount/{amount}', 'AddToCartController@store')->name('cart.store');
Route::post('/empty-cart/{uid}', 'AddToCartController@destroy')->name('cart.empty');




Route::get('stripe', 'StripeCheckoutController@stripe');
Route::post('stripe', 'StripeCheckoutController@stripePost')->name('stripe.post');
