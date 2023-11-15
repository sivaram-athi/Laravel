<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/twitter', function () {
    return view('twitter_welcome');
});

Route::middleware('auth')->group(function () {

    /* twitter */

    Route::get('twitter/tweets', 'TweetsController@index')->name('twitter_home');
    Route::post('twitter/tweets', 'TweetsController@store');
    Route::post('twitter/tweets/{tweet}/like', 'TweetLikesController@store');
    Route::delete('twitter/tweets/{tweet}/like', 'TweetLikesController@destroy');
    Route::post('twitter/profiles/{user}/follow', 'FollowsController@store')->name('twitter_follow');
    Route::get('twitter/profiles/{user}/edit', 'ProfileController@edit')->middleware('can:edit,user');
    Route::patch('twitter/profiles/{user}', 'ProfileController@update')->middleware('can:edit,user');
    Route::get('twitter/explore', 'ExploreController');
    Route::get('twitter/profiles/{user}/notification', 'ProfileController@request')->name('request');
    Route::put('twitter/profiles/{id}/request', 'FollowsController@accept')->name('twitter_accept');
    Route::delete('twitter/profiles/{id}/request', 'FollowsController@decline')->name('twitter_decline');
    Route::get('twitter/profiles/{user}', 'ProfileController@show')->name('twitter_profile');
    Route::post('twitter/profiles/{user}/message', 'MessageController@message')->name('message');
    Route::get('twitter/profiles/{user}/message', 'MessageController@message')->name('message');
    Route::post('twitter/profiles/msg/{id}', 'MessageController@store')->name('twitter_msg');
    Route::get('twitter/profiles/{user}/chats', 'ProfileController@chat')->name('chats');
    /* twitter */





});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

/* amazon */

Route::get('/amazon', 'HomeController@index');
Route::get('/amazon/search', 'CategoryController@find')->name('category');
Route::get('/amazon/search/{id}', 'CategoryController@show')->name('category_product');
Route::get('/amazon/search/list/{id}', 'CategoryController@list')->name('current_product');

Route::middleware('auth')->group(function () {
    Route::post('/amazon/addCart', 'CartController@index');
    Route::get('/amazon/cart', 'CartController@view')->name('cartPage');
    Route::get('/amazon/cart/cart', 'CartController@view2');
    Route::get('/amazon/cart/del', 'CartController@view3');
    Route::get('/amazon/cart/web', 'CartController@view1');
    Route::get('amazon/cart/buy', 'BuyController@index')->name('buy');
    Route::post('amazon/cart/buy', 'BuyController@order')->name('placeOrder');
    Route::get('/amazon/cart/singleBuy/{id}', 'BuyController@singleBuy')->name('singleBuy');
    Route::post('/amazon/cart/singleBuy/{id}', 'BuyController@singleOrder')->name('singleOrder');
    Route::get('/amazon/orders', 'BuyController@buyingOrder')->name('orders');
});

/* admin */

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/amazon/admin', 'AdminController@index')->name('list');
    Route::get('/amazon/admin/search', 'AdminController@adminSearch')->name('adminSearch');
    Route::get('/amazon/admin/category', 'AdminController@categorylist')->name('CategoryList');
    Route::post('/amazon/admin/save', 'AdminController@store')->name('newProduct');
    Route::post('/amazon/admin/saveCategory', 'AdminController@storeCategory')->name('newCategory');
    Route::get('/amazon/admin/addproduct', 'AdminController@add')->name('addProduct');
    Route::get('/amazon/admin/addcategory', 'AdminController@addcategory')->name('addCategory');
    Route::post('/amazon/admin/approve', 'AdminController@statusUpdate');
    Route::get('/amazon/admin/edit/{id}', 'AdminController@edit')->name('edit');
    Route::get('/amazon/admin/categoryedit/{id}', 'AdminController@categoryedit')->name('categoryedit');
    Route::post('/amazon/admin/categoryedit/{id}', 'AdminController@categoryupdate')->name('updatecategory');
    Route::post('/amazon/admin/edit/{id}', 'AdminController@update')->name('update');
    Route::post('/amazon/admin/delete', 'AdminController@destroy');
    Route::post('/amazon/admin/categorydelete', 'AdminController@delete');
    Route::get('/amazon/admin/userlist', 'AdminController@userlist')->name('userlist');
});



/* admin */

/* amazon */