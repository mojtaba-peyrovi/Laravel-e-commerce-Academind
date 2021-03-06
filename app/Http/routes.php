<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    //'uses' => 'productController@getIndex',
    //'as' => 'product.Index'
    'uses' => 'productController@getIndex',
    'as' => 'product.all'
    ]);

    Route::get('/add-to-cart/{id}',[
        'uses' => 'productController@getAddToCart',
        'as' => 'product.addToCart'
    ]);

    Route::get('/reduce/{id}',[
        'uses' => 'productController@getReduceByOne',
        'as' => 'product.reduceByOne'
    ]);

    Route::get('/remove/{id}',[
        'uses'=>'productController@getRemoveItem',
        'as' => 'product.remove'
    ]);

    Route::get('/shopping-cart',[
        'uses' => 'productController@getCart',
        'as' => 'product.shoppingCart'
    ]);

    Route::get('/checkout',[
        'uses' => 'productController@getCheckout',
        'as' => 'checkout',
        'middleware' =>'auth'
    ]);

    Route::post('/checkout',[
        'uses' => 'productController@postCheckout',
        'as' => 'checkout',
        'middleware' =>'auth'
    ]);

Route::group(['prefix' => 'user'], function(){

    /* route::get(['middleware' => 'guest'], function(){
        Route::get('/signup', [
            'uses' => 'userController@getSignup',
            'as' => 'user.signup'
        ]);

        Route::post('/signup', [
            'uses' => 'userController@postSignup',
            'as' => 'user.signup'
        ]);

        Route::get('/signin', [
            'uses' => 'userController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin', [
            'uses' => 'userController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    route::get(['middleware' => 'auth'], function(){
        Route::get('/profile', [
            'uses' => 'userController@getProfile',
            'as' => 'user.profile'
        ]);

        Route::get('/logout', [
            'uses' => 'userController@getLogout',
            'as' => 'user.logout'
        ]);
    }); */
    Route::get('/signup', [
        'uses' => 'userController@getSignup',
        'as' => 'user.signup',
        'middleware' => 'guest'
    ]);
    Route::post('/signup', [
        'uses' => 'userController@postSignup',
        'as' => 'user.signup',
        'middleware' => 'guest'
    ]);

    Route::get('/signin', [
        'uses' => 'userController@getSignin',
        'as' => 'user.signin',
        'middleware' => 'guest'
    ]);
    Route::post('/signin', [
        'uses' => 'userController@postSignin',
        'as' => 'user.signin',
        'middleware' => 'guest'
    ]);

    Route::get('/profile', [
        'uses' => 'userController@getProfile',
        'as' => 'user.profile',
        'middleware' => 'auth'
    ]);

    Route::get('/logout', [
        'uses' => 'userController@getLogout',
        'as' => 'user.logout',
        'middleware' => 'auth'
    ]);


});
