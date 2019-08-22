<?php

namespace App\Http\Controllers;

use Aimeos\Controller\Frontend\Exception;
use Aimeos\Shop\Base\Aimeos;
use Aimeos\Shop\Controller\BasketController;
use App\ArtistDesigns;
use App\ProductInformation;
use App\Storefront;
use Illuminate\Http\Request;
use App\Http\Services\MockupgenService;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Aimeos\MShop\Order\Item\Base\Product\Iface;

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
     * @param Request $request
     * @param int $pid      Product ID
     * @param int $did      Design ID
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $pid, $did = null)
    {

        $art_id = ($request->has('art_id')) ? $request->input('art_id') : 0;

        $product = DB::table('tbl_products')
            ->select('image')
            ->where('id', '=', $pid)
            ->get();

        $images = DB::table('tbl_media_library')
            ->select("full_url","thumbnail")
            ->whereIn("id", explode(",", $product[0]->image) )
            ->get();

        $art = DB::table(DB::raw('tbl_art_work as artwork'))
            ->select(DB::raw("artwork.*, media.full_url"))
            ->leftJoin(DB::raw("tbl_media_library as media"), function($join){
                $join->on(DB::raw("media.id"), "=", DB::raw("artwork.mediaid"));
            })
            ->whereRaw(DB::raw("artwork.id = " . $art_id))
            ->where('is_private', '=', '0')
            ->get();

        $artwork = DB::table(DB::raw("tbl_art_work as art"))
            ->select(DB::raw("DISTINCT media.full_url"))
            ->leftJoin(DB::raw("tbl_media_library as media"), function($j) {
                $j->on(DB::raw("media.id"), "=", DB::raw("art.mediaid"));
            })
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
            ->where("productId","=",$pid)
            ->get();

        $variants = DB::table('tbl_product_variants')
            ->where('ProductId', '=', $pid)
            ->get();

        foreach($attributes as $key => $attr){
            foreach($variants as $vars){
                if($attr->code1 == $vars->color_code_1 && ($vars->image == null || empty($vars->image))){
                    unset($attributes[$key]);
                }
            }
        }

        $user_id = (Auth::check()) ? Auth::user()->getAuthIdentifier() : null;

        $design = null;

        // Get Design if Exists
        if(!is_null($did)) {
            $design = \App\ArtistDesigns::find($did)->where(function($query) use($user_id){
                $query->where('artist_id', '=', $user_id)
                    ->orWhereNull('artist_id');
            })->get();
        }

        // List Storefronts if user is logged in
        $storefronts = null;

        if(Auth::check()){
            $storefronts = Storefront::where("user_id", "=", $user_id)->get();
        }

        // Get Image Dimensions

        //list($w,$h) = getimagesize((strpos($images[0]->full_url, "http://") ? $images[0]->full_url :
        //URL::to("/") . $images[0]->full_url));

        $googleList = googleFontList();
        $googleLink = str_replace(" ", "+", implode("|",array_keys($googleList)));


        return view('Mockup.mockupgen-new', [
            'art' => $art,
            'images' => $images,
            'pid' => $pid,
            'artwork' => $artwork,
            'attributes' => $attributes,
            'variants' => $variants,
            'token' => $this->getToken(),
            'canvasUrls' => $this->standInImageUrls(),
            'storefronts' => $storefronts,
            'design' => $design,
            'googleFontList' => googleFontList(),
            'googleFontLink' => $googleLink
        ]);
    }

    /**
     * Used for a standalone Canvas
     * @param Request $request
     * @param $pid
     * @param $designId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function standAlone(Request $request, $pid, $designId)
    {
        $art_design = ArtistDesigns::where('id', $designId)->first();

        $product = DB::table('tbl_products')
            ->select('image')
            ->where('id', '=', $pid)
            ->get();

        $images = DB::table('tbl_media_library')
            ->select("full_url", "thumbnail")
            ->whereIn("id", explode(",", $product[0]->image))
            ->get();

        return view('Mockup.standalone', [
            'images' => $images,
            'pid' => $pid,
            'art_design' => $art_design
        ]);

    }

    /**
     * Items to be displayed on the MockupGenerator page
     * @return array
     */
    private function standInImageUrls(){
        /*
        // pillow 1456
        // hat 1402
        // shirt 112
        // hoodie 111
        // bag 333
        // canvas 1455
        // cup
        */

        $urls = [];

        // Get some URLS and TEMPLATES
        $urls['0'] = ProductInformation::mediaById(1456)[0]->url;
        $urls['1'] = ProductInformation::mediaById(112)[0]->url;
        $urls['2'] = ProductInformation::mediaById(1402)[0]->url;
        $urls['3'] = ProductInformation::mediaById(1455)[0]->url;
        //$urls['cup'] = "/images/mug.jpg";

        return $urls;
    }

    /**
     * Save the design
     * @param Request $request
     * @param $pid
     * @param null $did
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(Request $request, $pid, $did = null){

        /**
         * TODO: Validate User and Input
         *
        $validate = $request->validate([
            'design_object' => 'required'
        ]);
         */

        // GET USERS ID OR SET TO 0
        $user_id = (Auth::check()) ? Auth::user()->getAuthIdentifier() : null;

        // Assume object is good
        $design_data = ($request->has('design_object')) ? $request->input('design_object') : null;

        // For Artist
        $is_public = ($request->has('is_public')) ? $request->input('is_public') : true;
        $storefront_id = ($request->has('storefront_id')) ? $request->input('storefront_id') : null;
        $design_id = ($request->has('design_id')) ? $request->input('design_id') : null;

        // Create Object
        $design = ArtistDesigns::createDesign(
            $design_data, $pid, $user_id, $storefront_id, $is_public, $design_id
        );

        if($design){
            $request->session()->put('design_id', $design);
        } else {
            $request->flash('warning', 'Unable to create design');
        }

        return (($design) ? redirect('/product-details/' . $pid . '/' . $design) : redirect()->route('mockupgenerator'));

    }

}
