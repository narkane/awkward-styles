<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Artwork;

/**
 * Class CollectionsController
 * @package App\Http\Controllers
 *
 */
class CollectionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

//    @return \Illuminate\Http\Response

    public function searchSuggestions(Request $request, $id)
    {

        $user_id = Auth::user()->id;

        $countArray = ['25','50','75','100'];

        $take = ($request->has('count') && in_array($request->get('count'),$countArray)) ? $request->get('count') : 25;

        // If page = 1, skip should be 0. Otherwise, calculate based on TAKE which is the count.
        $skip = ($request->has('page')) ? (($request->get('page') != 1) ? ($request->get('page') - 1) * $take : 0) : 0;

        $dbCall = DB::table(DB::raw("tbl_categories_m AS t1"))
            ->select(DB::raw("DISTINCT t2.id, t2.label, t2.salePrice, t2.shortDescription"), DB::raw("t3.full_url as full_url"))
            ->leftJoin(DB::raw("tbl_products as t2"), function ($q) {
                $q->on(DB::raw("FIND_IN_SET(t1.id, t2.categoryId)"), ">", DB::raw("0"));
            })
            ->leftJoin(DB::raw("tbl_media_library as t3"), function ($q) {
                $q->on(DB::raw("t3.id"), "=", DB::raw("t2.image"));
            })
            ->where('t1.name', '=', $id)
            ->orWhere('t1.name', 'LIKE', '%' . $id . '%')
            ->orWhere(function ($q) use ($id) {
                $q->where('t2.label', '=', $id);
                $q->where('t2.label', 'LIKE', '%' . $id . '%');
            })
            ->orWhere(function ($q) use ($id) {
                $q->where('t2.shortDescription', 'LIKE', '%' . $id . '%');
            });

        /**
         * Setup Pagination
         */
        $total = count($dbCall->get());

        $totalPages = ceil($total / $take);

        $current = ($request->has('page')) ? $request->get('page') : 1;

        $tags = $dbCall->skip($skip)
            ->take($take)->get();

        // Current Page
        $url = $request->url() . "?count=" . $take . "&";

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

        if (isset($tags)) {
            return view('search-results', [
                'request' => $tags,
                'user' => $user_id,
                'totalFound' => $total,
                'currentPage' => $current,
                'paginator' => $paginationArr,
                'paginatorArea' => $paginatorArea,
                'totalPages' => $totalPages,
                'url' => $url]);
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
