<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MockupgenService;
class MockupgenController extends Controller
{
    protected $mockupgen;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MockupgenService $mockupgen)
    {   
        $this->mockupgen = $mockupgen;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        // $product = $this->mockupgen->index($productId);
        // $artwork_product = $this->mockupgen->artworkProduct();
        // $artworkCat = $this->mockupgen->artworkCategories();
        // $productImages = $this->mockupgen->getProductsImages($productId);
        // $products = $this->mockupgen->getProductsList();
        // $product_id = ["product_id" => $productId];
        // //  dd($product_id);//[0]->image_url);
        // return view('mockupgen', compact('product_id','product', 'artwork_product', 'artworkCat', 'productImages', 'products'));
        return view('mockupgen-new');
    }
}
