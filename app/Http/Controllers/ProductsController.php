<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Artwork;

class ProductsController extends Controller
{

    private $countArray = ['25','50','75','100'];

    private $take = 25;

    private $skip = 0;

    /*
     * MAIN CATEGORIES:
     *      MEN
     *      WOMEN
     *      KIDS / BABY / INFANT / TODDLER
     *      HATS / CAPS
     *      MUGS
     *      CANVAS
     *      BAGS
     *      DEVICE CASES
     *      STICKERS
     *      GIFTS
     *      OTHER/MORE
     */

    private $cats = [
        "Mens", "Womens", "Boys", "Girls", "Hats", "Jerseys", "BaseBall", "Soccer", "Football", "Mugs", "Canvas",
        "Tote Bags", "Drawstring Bags", "Duffel Bags", "BackPacks", "Cases",
        "Stickers", "Gifts", "Other"
    ];

    private $clothCats = [ "Mens", "Womens", "Boys", "Girls"];

    public function index(Request $request, $category, $type = null, $select = null){

        $this->take = ($request->has('count') && in_array($request->get('count'), $this->countArray)) ? $request->get('count') :
            ((!is_null(session()->get('totalCount', null)) ? session()->get('totalCount') : 25));

        session()->put('totalCount',$this->take);

        $category = ucfirst($category);

        if(!in_array($category, $this->cats)){
            return redirect()->action("ProductsController@home");
        }

        $searchTerm = (in_array($category,$this->clothCats) && $category != "Canvas" && $category != "Other") ?
            (($category == "Boys") ? "Youth" : $category) : rtrim($category,"s");

        $user_id = (Auth::check()) ? Auth::user()->id : 0;

        // If page = 1, skip should be 0. Otherwise, calculate based on TAKE which is the count.
        $this->skip = ($request->has('page')) ? (($request->get('page') != 1) ? ($request->get('page') - 1) * $this->take : 0) : 0;

        if($category == "Other"){

            // Get where it doesn't equal anything else
            $dbCall = DB::table(DB::raw("tbl_categories_m as cat"))
                ->select(DB::raw("prod.*, media.full_url"))
                ->leftJoin(DB::raw("tbl_products as prod"), function ($join) use ($searchTerm, $type) {
                    $join->whereRaw(DB::raw($this->addOntoJoin($searchTerm, $type, true)));
                })
                ->leftJoin(DB::raw("tbl_media_library as media"), function ($join) {
                    $join->on(DB::raw("media.id"), "=", DB::raw("prod.image"));
                });

                foreach($this->cats as $cat){
                    if($cat != "Other"){
                        $dbCall->where(DB::raw("cat.name"), "NOT LIKE", DB::raw("'" . $cat . "%'"))
                            ->where(DB::raw("prod.label"), "NOT LIKE", DB::raw("'%" .
                                (($cat != "Canvas" && $cat != "Other") ?  substr($cat,0,-1) : $cat) . "%'"));
                    }
                }

        } else {

            $dbCall = DB::table(DB::raw("tbl_categories_m as cat"))
                ->select(DB::raw("prod.*, media.full_url"))
                ->leftJoin(DB::raw("tbl_products as prod"), function ($join) use ($searchTerm, $type) {
                    $join->whereRaw(DB::raw($this->addOntoJoin($searchTerm, $type)));
                })
                ->leftJoin(DB::raw("tbl_media_library as media"), function ($join) {
                    $join->on(DB::raw("media.id"), "=", DB::raw("prod.image"));
                })
                ->where(DB::raw("cat.name"), "LIKE", DB::raw("'" . $searchTerm . "%'"));

            if($category == "Boys"){
                $dbCall->where("prod.label", "NOT LIKE", DB::raw("'%girl%'"));
            } else if($category == "Girls"){
                $dbCall->where("prod.label", "NOT LIKE", DB::raw("'%boy%'"));
            }

            $dbCall->orWhere(DB::raw("prod.label"), "LIKE", DB::raw("'%" . $searchTerm . "%'"));

        }

        $dbCall->groupBy(DB::raw("prod.id"));

        /**
         * Setup Pagination
         */
        $total = count($dbCall->get());

        $totalPages = ceil($total / $this->take);

        $current = ($request->has('page')) ? $request->get('page') : 1;

        $tags = $dbCall->skip($this->skip)
            ->take($this->take)->get();

        // Current Page
        $url = $request->url() . "?count=" . $this->take . "&";

        // Pagination..
        $paginationArr = [];
        $pageHolders = [];
        $paginatorArea = 0;
        $counter = 0;

        for($i = 1; $i <= $totalPages; $i++){

            if($counter == 10){
                $paginationArr[] = $pageHolders;
                $pageHolders = [];
                $counter = 0;
            }

            if($i == $current){
                // This is because we should be in the latest iteration
                $paginatorArea = count($paginationArr);
            }

            $pageHolders[] = $i;

            if($i == $totalPages) $paginationArr[] = $pageHolders;
            $counter++;
        }

        $viewPage = (!is_null($select)) ? 'Products.select' : 'Products.products';

        if (isset($tags)) {
            return view($viewPage , [
                'category' => $category,
                'type' => $type,
                'request' => $tags,
                'user' => $user_id,
                'totalFound' => $total,
                'currentPage' => $current,
                'paginator' => $paginationArr,
                'paginatorArea' => $paginatorArea,
                'totalPages' => $totalPages,
                'token' => $this->getToken(),
                'url' => $url,
                'take' => $this->take,
                'category_list' => $this->cats,
                'cloth_cats' => $this->clothCats,
                'select' => ($select == false) ? "" : "/select/"
            ]);
        }
        return view('Products.products', ['request' => null]);

    }

    public function home(Request $request){
        return view('Products.home');
    }

    public function select(Request $request){
        return view('Products.select');
    }

    private function locateCatId($search){
        $db = DB::table('tbl_categories_m')
                ->where('name','=',ucfirst($search))->first();

        return ($db) ? $db->id : false;
    }

    private function addOntoJoin($category, $type, $not = false){
        $on = DB::raw("FIND_IN_SET(cat.category_id,prod.categoryId)");

        if(!is_null($type)){
            // $typeId = $this->locateCatId($request->query('type'));

            // if($typeId) {

            $on .= " AND (" .DB::raw("prod.label " . (($not) ? "NOT LIKE" : "LIKE") . " '%" . $type . "%')");
            //}

        } else if($category == "Mens" || $category == "Womens" || $category == "Boys" || $category == "Girls"){
            $on .= " AND (" . (DB::raw("prod.label LIKE 'shirt%' OR prod.label LIKE '%-shirt%')"));
        }

        return $on;

    }

}