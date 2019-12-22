<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('arif', 'FrontendController@arif') ;
Route::get('contact', 'FrontendController@contact') ;



Route::get('contact', function () {
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product', 'ProductController@product');
Route::post('/product/insert', 'ProductController@productinsert');
Route::get('/product/delete/{product_id}', 'ProductController@productdelete');