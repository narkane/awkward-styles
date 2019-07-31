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
    public function index(Request $request, $art_id, $pid)
    {

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

        // Get Image Dimensions

        //list($w,$h) = getimagesize((strpos($images[0]->full_url, "http://") ? $images[0]->full_url :
        //URL::to("/") . $images[0]->full_url));

        return view('Mockup.mockupgen-new', [
            'art' => $art,
            'images' => $images,
        ]);
    }
}
