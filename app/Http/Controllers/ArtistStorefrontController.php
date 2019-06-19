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
    public function __construct(ArtistStorefrontService $artistStoreFront)
    {   
        //$this->middleware('auth');
        $this->artistStoreFront = $artistStoreFront;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $storeId = '';
        if(isset($storeId)) { $storeId = $request->storeId; }
        $owner_data = array();
        $products = array();
       
        //$products1 = $this->artistStoreFront->index();
        //$user_id = Auth::user()->id;
        $owner_data= array();
        $storefronts = DB::SELECT('select * from tbl_store_front where id=? order by id DESC LIMIT 1',[$storeId]);
        if(count($storefronts)>0) {
            $owner_data = DB::SELECT('select name from users where id=?',[$storefronts[0]->user_id]);
            $products = DB::SELECT('select p.id,p.code,p.label,t.id,t.designed_image,t.created_by_id,t.artwork_id,t.artwork_image from tbl_art_product t join tbl_products p ON p.id=t.product_id where created_by_id=?',[$storefronts[0]->user_id]);
        }
        //  dd($products1);//[0]->image_url);
        //if(count($storefronts)>0) {
            return view('artiststorefront', ['storefronts'=>$storefronts, 'products'=>$products, 'owner_data'=>$owner_data]);
        /*} else {
            return redirect('createstore');
        }*/
    }
}
