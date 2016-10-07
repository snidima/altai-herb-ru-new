<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');


Route::get('/shop', ['as' => 'shop', 'uses' => 'ProductController@main']);



Route::get('/shop/category/{id}', ['as' => 'applyCategory', 'uses' => 'ProductController@applyCategory']);







Route::group([ 'middleware' => 'notUser'], function()
{
    Route::get('/login', [ 'uses' => 'LoginController@getLogin' ] )->name('getLogin');
    Route::post('/login', [ 'uses' => 'LoginController@postLogin' ] );

});

Route::get('/logout', [ 'uses' => 'LoginController@logout' ] )->name('logout');





Route::get('/register', [ 'uses' => 'LoginController@getRegister' ] )->name('register');
Route::post('/register', [ 'uses' => 'LoginController@postRegister' ] );





Route::group([ 'middleware' => 'auth', 'prefix'=>'user'], function()
{
    Route::get('/', 'ProfileController@welcome')->name('profile');

    Route::get('/info', 'ProfileController@userInfo')->name('profileInfo');
});




Route::get('/payment', function(){
    return view('payment');
})->name('payment');

Route::get('/information', function(){
    return view('information');
})->name('information');

Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');
