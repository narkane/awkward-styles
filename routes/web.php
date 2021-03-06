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

use App\DesignLibrary;

Route::get('/', function () {
    return redirect('list');
});

Auth::routes();


###jthummel
Route::get('/affiliates', 'AffiliatesController@index')->name('affiliates');
Route::get('/comingsoon', 'ComingSoonController@index')->name('comingsoon');
Route::get('/search/{id}', 'CollectionsController@searchSuggestions')->name('search-results');
Route::get('/thetool/{productId}', 'ToolController@index')->name('thetool');
###them
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/account', 'DashboardController@myAccount')->name('account');
Route::get('/artiststorefront/{storeId}', 'ArtistStorefrontController@index')->name('artiststorefront');
Route::get('/mockupgenerator/{productId}', 'MockupgenController@index')->name('mockupgenerator');
Route::get('/mockupgen', 'MockupgenController@index')->name('mockupgenerator');
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

/**
 * API CALLS NEEDED
 */
Route::group(['prefix' => 'api/'], function($app){

    /**
     * COLLECT TEMPLATE INFORMATION FROM THE DATABASE
     *
     * RETURN DATA OR DEFAULT DATA
     */
    $app->get('template/{id}/{size}', 'API\ImageTemplateController@getTemplate')->name('gettemplate');

    /**
     * INSERT NEW TEMPLATE INTO THE TEMPLATE DATABASE
     *
     * RETURNS ID IF SUCCESSFUL
     */
    $app->post('template', 'API\ImageTemplateController@insertTemplate')->name('insertTemplate');

    /**
     * FETCH ALL LIBRARIES OF A GIVEN USER
     */
    $app->get('designs/all', 'API\DesignLibraryController@fetchLibrary')->name('allDesigns');

    /**
     * FETCH A SINGLE LIBRARY FOR THE USER
     */
    $app->get('designs/{id}', 'API\DesignLibraryController@fetchLibrary')->name('singleDesign');

    /**
     * CREATE A LIBRARY
     */
    $app->post('designs/create', 'API\DesignLibraryController@createLibrary')->name('createLibrary');

    /**
     * DELETE A SINGLE LIBRARY
     */
    $app->get('designs/remove/{id}', 'API\DesignLibraryController@removeLibrary')->name('deleteLibrary');

    /**
     * FETCH A LIBRARY PRINT BY ID
     */
    $app->get('designs/print/{id}', 'API\DesignPrintsController@fetchPrintById')->name('fetchPrintById');

    /**
     * FETCH A LIBRARY PRINT BY LIBRARY ID AND SIZE
     */
    $app->post('designs/print/', 'API\DesignPrintsController@fetchPrintByLibraryAndSize')->name('fetchPrintByLibAndSize');

    /**
     * DELETE A LIBRARY PRINT BY ID
     */
    $app->get('designs/print/remove/{id}', 'API\DesignPrintsController@remove')->name('deletePrint');

    /**
     * ADD A PRINT/LIBRARY
     */
    $app->post('designs/print/create', 'API\DesignPrintsController@createPrint')->name('createPrint');

});