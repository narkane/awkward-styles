<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Artwork;

class CollectionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

//    @return \Illuminate\Http\Response

    public function searchSuggestions(Request $request) {
        $q = $request->id;
        $termIDs = DB::select('select category_id from tbl_categories_m where name like "%'.$q.'%"');
        $tags =[];
        foreach($termIDs as &$id) {
            // echo json_encode($id->category_id);
            $query = null;
            $query = DB::select(' select * from tbl_products where FIND_IN_SET("'.$id->category_id.'", categoryId) > 0');
            // console.log($termIDs);
            // console.log(DB::select(' select label from tbl_products where FIND_IN_SET('.$id.', categoryId) > 0'));
            if(count($query) > 0) {
                array_push($tags, $query); 
                //echo json_encode($tags);
            }
        }
        if(isset($tags)){
            return view('search-results', ['request' => json_encode($tags)]);
        }
        return view('search-results', ['request' => null]);
      }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = $this->mockupgen->index($productId);
        //  dd($product);//[0]->image_url);
        return view('collections');
    }  
	
}
