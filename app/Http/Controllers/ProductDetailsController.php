<?php

namespace App\Http\Controllers;

use App\ArtistDesigns;
use App\Templates;
use Illuminate\Http\Request;
use App\Http\Services\ProductDetailsService;
use App\Utility\GenerateTokenUtility;
use DB;
use Illuminate\Support\Facades\Auth;

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
     * @param Request $request
     * @param $productId
     * @param $designId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $productId, $designId = null)
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

        if($designId){
            $design = ArtistDesigns::where('id',$designId)->first();

            $designerTemplates = $this->getDesignerArt($design->artist_id);
        } else {
            $designerTemplates = $this->getDesignerArt();
        }

        $template = Templates::where('pid',$productId)->first();

        return view('productdetails', [
            'user_id' => (Auth::check()) ? Auth::user()->getAuthIdentifier() : false,
            'template' => $template,
            'product_id' => $productId,
            'product' => $product,
            'variants' => $variants,
            'details' => $details,
            'media' => $media,
            'attributes' => $attributes,
            'designerTemplates' => $designerTemplates,
            'designID' => $designId
        ]);
    }

    private function getDesignerArt($id = 0){
        $db = DB::table("tbl_art_work")
            ->select(DB::raw("tbl_art_work.*, tbl_media_library.full_url"))
            ->leftJoin("tbl_media_library", function($join){
                $join->on(DB::raw("tbl_media_library.id"), "=", DB::raw("tbl_art_work.mediaid"));
            })
            ->where('is_private', '=', '0');

        if($id != 0){
            $db = $db->where(DB::raw('tbl_art_work.parentid'), '=', $id);
        }
        return $db->take(5)->get();
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
