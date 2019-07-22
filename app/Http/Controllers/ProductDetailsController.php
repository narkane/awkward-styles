<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductDetailsService;
use App\Utility\GenerateTokenUtility;
class ProductDetailsController extends Controller
{
    protected $productDetails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductDetailsService $productDetails)
    {   
        $this->productDetails = $productDetails;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($productId)
    {
        // $product = $this->mockupgen->index($productId);
        //  dd($product);//[0]->image_url);
        return view('productdetails', ['product_id' => $productId]);
    }

    /**
     * Show the seller page.
     *
     * @return \Illuminate\Http\Response
     */
    public function seller()
    {
        // $product = $this->mockupgen->index($productId);
        //  dd($product);//[0]->image_url);
        return view('seller');
    }

    /**
     * List all products.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function products(Request $request)
    {
        // $product = $this->mockupgen->index($productId);
        //  dd($product);//[0]->image_url);
        $tokenGen = array(
                'token'=>GenerateTokenUtility::generateToken(),
                'header'=>GenerateTokenUtility::getHeaders(GenerateTokenUtility::generateToken())
            );
        // dd($tokenGen);
        return view('products',compact('tokenGen'));
    }
}
