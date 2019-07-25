<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ProductDetailsService;
use App\Utility\GenerateTokenUtility;
use DB;

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
    public function index(Request $request, $productId)
    {
        // $product = $this->mockupgen->index($productId);
        //  dd($product);//[0]->image_url);

        /**
         * ACTUAL PRODUCT
         */
        $product = DB::table("tbl_products")
                ->select("*")
                ->where("id", "=", $productId)->get();

        $variants = DB::table('tbl_product_variants')
                        ->where('ProductId', '=', $productId)
                        ->get();

        $details = DB::table('tbl_product_details')
                        ->where("productId","=",$productId)
                        ->get();

        /**
         * PRODUCT IMAGES
         */
        $media = DB::table('tbl_media_library')
                    ->select("full_url","thumbnail")
                    ->whereIn("id", explode(",", $product[0]->image) )
                    ->get();


        $attributes = DB::table('tbl_attribute_detail')
                    ->select(DB::raw("tbl_attribute_detail.attribute_id, tbl_attribute_detail.value, tbl_attribute_detail.code1,
                    tbl_attribute_detail.code2, tbl_attribute_detail.imageId, tbl_attribute_m.label as attribute_label, tbl_media_library.full_url as img_url"))
                    ->leftJoin('tbl_attribute_m', function($join){
                        $join->on(DB::raw("tbl_attribute_m.id"),"=",DB::raw("tbl_attribute_detail.attribute_id"));
                    })
                    ->leftJoin('tbl_media_library', function($join){
                        $join->on(DB::raw("tbl_media_library.id"), "=", DB::raw("tbl_attribute_detail.imageId"));
                    })
                    ->where("productId","=",$productId)
                    ->get();

        foreach($attributes as $key => $attr){
            foreach($variants as $vars){
                if($attr->code1 == $vars->color_code_1 && ($vars->image == null || empty($vars->image))){
                    unset($attributes[$key]);
                }
            }
        }

        return view('productdetails', [
            'product_id' => $productId,
            'product' => $product,
            'variants' => $variants,
            'details' => $details,
            'media' => $media,
            'attributes' => $attributes
        ]);
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
