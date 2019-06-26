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
        foreach($termIDs as &$id) {
            // echo json_encode($id->category_id);
            $tags = DB::select(' select * from tbl_products where FIND_IN_SET("'.$id->category_id.'", categoryId) > 0'); 
            // console.log($termIDs);
            // console.log(DB::select(' select label from tbl_products where FIND_IN_SET('.$id.', categoryId) > 0'));
            if(count($tags)>0) {
                $line = json_encode($tags);
                echo htmlentities($line);
            }
        }
        return view('search-results', ['request' => json_encode($tags)]);
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
