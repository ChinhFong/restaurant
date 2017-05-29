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
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::group(['middleware'=>['auth']], function(){
  Route::group(['prefix' => 'dashboard'], function () {
        Route::resource('modules','ModuleController');
        Route::get('mod','AjaxController@getModule');
        Route::resource('products','ProductsController');
        Route::resource('invoices','InvoicesController');
        Route::resource('submodules','SubmoduleController');
        Route::resource('pointofsale','PointOfSaleController');
  });
});
