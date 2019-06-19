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
    return redirect('list');
});

Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/account', 'DashboardController@myAccount')->name('account');
Route::get('/artiststorefront/{storeId}', 'ArtistStorefrontController@index')->name('artiststorefront');
Route::get('/mockupgenerator/{productId}', 'MockupgenController@index')->name('mockupgenerator');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createstore', 'MyStoresController@createStore')->name('createstore');
Route::post('/savestore', 'MyStoresController@saveStore')->name('savestore');
Route::post('/saveartwork', 'MyStoresController@saveartwork')->name('saveartwork');
Route::get('/mystores', 'MyStoresController@index')->name('mystores');
Route::get('/myearnings', 'MyEarningsController@index')->name('myearnings');
Route::get('/addartwork', 'MyStoresController@addArtWork')->name('addartwork');
Route::get('/selectproductype/{artwork_id}/{artwork_name}', 'ProductsController@selectProducType')->name('selectproductype');
Route::get('/addproducts/{artwork_id}/{artwork_name}', 'ProductsController@addProducts')->name('addproducts');
Route::get('/addproducts', 'ProductsController@addProducts')->name('addproducts');
Route::post('/setpricing', 'ProductsController@setPricing')->name('setpricing');
Route::get('/tagsuggestions/{id}', 'MyStoresController@tagSuggestions')->name('tagsuggestions');
Route::get('/artworkmanagement', 'ArtworkManagementController@index')->name('artworkmanagement');
Route::get('/updateartworkstatus', 'ArtworkManagementController@updateStatus')->name('updateartworkstatus');
Route::get('/loadmore', 'ArtworkManagementController@loadMore')->name('loadmore'); 
Route::get('/product-details/{productId}', 'ProductDetailsController@index')->name('productdetail');
Route::get('/collections', 'CollectionsController@index')->name('collections');
Route::get('/seller', 'ProductDetailsController@seller')->name('seller');
Route::get('/ordertracking', 'OrdersTrackingController@ordertracking')->name('ordertracking');
Route::get('/products', 'ProductDetailsController@products')->name('collections');