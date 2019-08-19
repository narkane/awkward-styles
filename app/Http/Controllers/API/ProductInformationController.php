<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ProductInformationController extends Controller
{

    private $limit = 4;

    private $typeArray = [
        'men',
        'women',
        'kids',
        'accessories',
        'phone',
        'home'
    ];

    /**
     * Pull Information from database for product display page.
     *
     * @param Request $request
     * @param $type
     * @param null $page
     * @param $limit
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductList(Request $request, $type, $page = null, $limit = null){

        $limit = (is_null($limit)) ? $this->limit : $limit;

        if(!in_array($type, $this->typeArray)){ $type = "men"; }

        $dbCall = \Illuminate\Support\Facades\DB::table(DB::raw("tbl_categories_m AS t1"))
            ->select(DB::raw("DISTINCT t2.id, t2.label, t2.salePrice, t2.shortDescription"), DB::raw("t3.full_url as full_url"))
            ->leftJoin(DB::raw("tbl_products as t2"), function ($q) {
                $q->on(DB::raw("FIND_IN_SET(t1.id, t2.categoryId)"), ">", DB::raw("0"));
            })
            ->leftJoin(DB::raw("tbl_media_library as t3"), function ($q) {
                $q->on(DB::raw("t3.id"), "=", DB::raw("t2.image"));
            })
            ->where('t1.name', '=', $type)
            ->orWhere('t1.name', 'LIKE', '%' . $type . '%')
            ->orWhere(function ($q) use ($type) {
                $q->where('t2.label', '=', $type);
                $q->where('t2.label', 'LIKE', '%' . $type . '%');
            })
            ->orWhere(function ($q) use ($type) {
                $q->where('t2.shortDescription', 'LIKE', '%' . $type . '%');
            });

        $totalPages = ceil(count($dbCall->get()) / $this->limit);

        $current = ($page) ? $page : 1;

        $skip = (!is_null($page)) ? (($page != 1) ? (($page - 1) * $this->limit) : 0) : 0;

        $tags = $dbCall->skip($skip)
            ->take($this->limit)->get();

        return response()->json(['totalPages' => $totalPages, 'currentPage' => $current, 'products' => $tags]);

    }

    public function createImage(Request $request){

        $data = $request->input('data');//base64_decode(str_replace('data:image/png;base64,','',$request->input('data')));
        //$image = imagecreatefromstring($data);
        header("Content-Type: image/svg+xml");
        echo $data;
        exit();
    }

}
