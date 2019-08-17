<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ArtistStorefrontService;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class ArtistStorefrontController extends Controller
{
    protected $artistStoreFront;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        //$this->middleware('auth');
        $this->artistStoreFront = $this;
    }

    /**
     * Show the application dashboard.
     *
     * @param $storeId
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $storeId)
    {

        $user_id = (Auth::check()) ? Auth::user()->getAuthIdentifier() : 0;

        $storefronts = \App\Storefront::where('id', '=', $storeId)->orderBy('id','desc')->first();

        $owner_data = ($storefronts) ?
            \App\User::where('id', '=', $storefronts->user_id)->get()
            : array();

        $products = ($storefronts) ?
            DB::table(DB::raw("tbl_art_product as t"))
                ->select(DB::raw("p.id,p.code,p.label,t.id,t.designed_image,t.created_by_id,t.artwork_id,t.artwork_image"))
                ->leftJoin(DB::raw("tbl_products p"), function($join) {
                    $join->on(DB::raw("p.id"), "=", DB::raw("t.product_id"));
                })
                ->where("created_by_id", "=", $storefronts->user_id)
                ->get()
            : array();

        // FOLLOWERS
        $followers = \App\Follow::find($storefronts->user_id)->where('private_follow','IS','false')
            ->with('user')
            ->get();


        // DO YOU FOLLOW?
        $i_follow = \App\Follow::where("follow_id", "=", $storefronts->user_id)->where("user_id", "=", $user_id)->exists();

        return view('Storefront.artiststorefront', [
            'storefronts'=>$storefronts,
            'products'=>$products,
            'owner_data'=>$owner_data,
            'followers' => $followers,
            'i_follow' => $i_follow
        ]);
    }
}
