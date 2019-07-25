<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ArtistStorefrontService;
//use Auth;
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

        $owner_data = array();

        $storefronts = DB::SELECT('select * from tbl_store_front where id=? order by id DESC LIMIT 1',[$storeId]);

        if(count($storefronts)>0) {
            $owner_data = DB::SELECT('select name from users where id=?',[$storefronts[0]->user_id]);
            $products = DB::SELECT('select p.id,p.code,p.label,t.id,t.designed_image,t.created_by_id,t.artwork_id,t.artwork_image from tbl_art_product t join tbl_products p ON p.id=t.product_id where created_by_id=?',[$storefronts[0]->user_id]);
        }

        return view('artiststorefront', ['storefronts'=>$storefronts, 'products'=>$products, 'owner_data'=>$owner_data]);
    }
}
