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



Route::get('/test', 'ProductController@loloo')->middleware('isAdmin');



Route::get('/cart', function(){
    return view('cart');
})->name('cart');




Route::group([ 'middleware' => 'isAdmin', 'prefix'=>'admin'], function()
{
    Route::get('/', 'AdminController@dashboard');

    Route::group(['prefix'=>'api'], function()
    {
        Route::get('/products', function (){
            $products = App\Product::first()

                ->with(['categories'=>function($q){
                    $q->orderBy('id','desc');
                }])

                ->with(['characteristics'=>function($q){
                    $q->with(['units'=>function($q){
                        $q->where('slug','=', 'weight');
                    }])

                        ->orderBy('id','desc');
                }]);

                ;

            return Response::json( $products->get()->toArray() );
        });


        Route::put('/product', function ( \Illuminate\Http\Request $request){

            $newProd = \App\Product::firstOrCreate([
                'name' => $request->name,
                'desc'=> $request->desc,
                'price' => $request->price,
            ]);

            $newProd->categories()->attach($request->cats);

            $newProd->characteristics()->attach($request->characteristics);

            return Response::json( ['ok'] );
        });


        Route::get('/characteristics', function (){
            $characteristics = \App\Characteristic
                ::with(['units'=>function($q){

                }]);

            $cats = \App\Category::all()
                ->where('title','<>','root');


            return Response::json( [
                'characteristics' => $characteristics->get()->toArray(),
                'cats' => $cats->toArray(),
            ] );
        });

    });

    Route::get('/add', function(){

        $newProd = \App\Product::firstOrCreate([
            'name' => 'test',
            'desc'=> 'desc',
            'price' => '666',
        ]);
        $newProd->characteristics()->attach([1,2,3]);

        dd(
//            $prod
        );


    });

});
