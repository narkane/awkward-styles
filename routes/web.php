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
Route::get('/search/{id}', 'SearchController@index')->name('search-results');
Route::get('/thetool/{productId}', 'ToolController@index')->name('thetool');
###them
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/account', 'DashboardController@myAccount')->name('account');
Route::post('/account', 'DashboardController@myAccount')->name('updateAccount');
Route::get('/artiststorefront/{storeId}', 'ArtistStorefrontController@index')->name('artiststorefront');
Route::get('/mockupgenerator/{art_id}/{pid}', 'MockupgenController@index')->name('mockupgenerator');
Route::get('/mockupgen', 'MockupgenController@index')->name('mockupgenerator');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createstore', 'MyStoresController@createStore')->name('createstore');
Route::get('/editstore/{id}', 'MyStoresController@editStore')->name('editStore');
Route::post('/savestore', 'MyStoresController@saveStore')->name('savestore');
Route::post('/saveartwork', 'MyStoresController@saveArtWork')->name('saveartwork');
Route::get('/mystores', 'MyStoresController@index')->name('mystores');
Route::get('/myearnings', 'MyEarningsController@index')->name('myearnings');
Route::get('/addartwork', 'MyStoresController@addArtWork')->name('addartwork');
Route::get('/selectproductype/{artwork_id}/{artwork_name}', 'AddProductsController@selectProducType')->name('selectproductype');
Route::get('/addproducts/{artwork_id}/{artwork_name}', 'AddProductsController@addProducts')->name('addproducts');
Route::get('/addproducts', 'AddProductsController@addProducts')->name('addproducts');
Route::post('/setpricing', 'AddProductsController@setPricing')->name('setpricing');
Route::get('/tagsuggestions/{id}', 'MyStoresController@tagSuggestions')->name('tagsuggestions');
Route::get('/artworkmanagement', 'ArtworkManagementController@index')->name('artworkmanagement');
Route::get('/updateartworkstatus', 'ArtworkManagementController@updateStatus')->name('updateartworkstatus');
Route::get('/loadmore', 'ArtworkManagementController@loadMore')->name('loadmore'); 
Route::get('/product-details/{productId}', 'ProductDetailsController@index')->name('productdetail');
Route::get('/collections', 'CollectionsController@index')->name('collections');
Route::get('/seller', 'ProductDetailsController@seller')->name('seller');
Route::get('/ordertracking', 'OrdersTrackingController@ordertracking')->name('ordertracking');
Route::get('/products/{category}/{type}', 'ProductsController@index')->name('products');
Route::get('/products/{category}/', 'ProductsController@index')->name('productNoType');
Route::get('/products', 'ProductsController@home')->name('producthome');

Route::get('/contact', 'ContactController@index')->name('contact us');

/**
 * API CALLS NEEDED
 */
Route::group(['prefix' => 'api/'], function($app){

    /**
     * PRINT PRODUCTS WITH LIMIT of 6
     */
    $app->get('productinformation/{type}/{page}', 'API\ProductInformationController@getProductList')->name('productlistFetcher');

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

    $app->get('product/generate/{pid}/{size}/{art_id}/{media_id}', 'API\ProductGenController@index')->name('createProduct');

});