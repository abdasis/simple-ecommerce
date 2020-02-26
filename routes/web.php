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
    return view('layouts.app');
});


Route::group(['prefix' => 'store', 'middleware' => 'auth'], function () {
    Route::get('create-store', 'StoreController@create')->name('store.create');
    Route::post('create-store', 'StoreController@add')->name('store.add');
    Route::get('list-store', 'StoreController@listStore')->name('store.list');
    Route::get('edit-store/{id}', 'StoreController@editStore')->name('store.edit-store');
    Route::post('update-store/{id}', 'StoreController@updateStore')->name('store.update-store');
    Route::get('delete-store/{id}', 'StoreController@deleteStore')->name('store.delete-store');
});

Route::group(['prefix' => 'sales', 'middleware' => 'auth'], function () {
    Route::get('create-sales', 'SalesController@createSales')->name('sales.create');
    Route::post('create-sales', 'SalesController@storeSales')->name('sales.store');
    Route::get('list-store', 'SalesController@listSales')->name('sales.list');
    Route::get('edit-sales/{id}', 'SalesController@editSales')->name('sales.edit');
    Route::post('update-sales/{id}', 'SalesController@updateSales')->name('sales.update');
    Route::get('delete-sales/{id}', 'SalesController@deleteSales')->name('sales.delete');
});


Route::group(['prefix' => 'product', 'middleware' => 'auth'], function () {
    Route::get('create-product', 'ProductController@create')->name('product.create');
    Route::post('create-product', 'ProductController@store')->name('product.store');
    Route::get('list-product', 'ProductController@list')->name('product.list');
    Route::get('edit-product/{id}', 'ProductController@edit')->name('product.edit');
    Route::post('update-product/{id}', 'ProductController@update')->name('product.update');
    Route::get('delete-product/{id}', 'ProductController@delete')->name('product.delete');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'UserController@logout')->name('user.logout');