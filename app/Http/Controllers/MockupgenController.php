<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\MockupgenService;
use DB;
use Illuminate\Support\Facades\URL;

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
    public function index(Request $request, $pid)
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

        // Get Image Dimensions

        //list($w,$h) = getimagesize((strpos($images[0]->full_url, "http://") ? $images[0]->full_url :
        //URL::to("/") . $images[0]->full_url));

        return view('Mockup.mockupgen-new', [
            'art' => $art,
            'images' => $images,
            'pid' => $pid,
            'artwork' => $artwork,
            'attributes' => $attributes,
            'variants' => $variants,
            'token' => $this->getToken()
        ]);
    }
}
