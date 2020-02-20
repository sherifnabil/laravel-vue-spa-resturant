<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/resturants', 'ResturantsController@index')->name('restos');
    Route::get('/resturants/menu/{id}', 'MenusController@index')->name('restos.menu');
    Route::get('resturants/orders/{id}', 'ResturantOrderController@index')->name('resto.orders');
    Route::get('resturants/orders/{id}/add', 'ResturantOrderController@add')->name('resto.orders.add');
});
