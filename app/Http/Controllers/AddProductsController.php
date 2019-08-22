<?php

namespace App\Http\Controllers;

use App\Artwork;
use App\ProductInformation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class AddProductsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProducts(Request $request)
    {
        $user_id = Auth::user()->getAuthIdentifier();

        // TODO: Add settings to contorl the actual item images to be shown
        /*
        // pillow 1456
        // hat 1402
        // shirt 112
        // hoodie 111
        // bag 333
        // canvas 1455
        // cup
        */

        $pidList = [
            "shirt" => 112,
            "hoodie" => 111,
            "hat" => 1402,
            "bag" => 333,
            "pillow" => 1456,
            "canvas" => 1455,
            //"cup" => 000
        ];

        $items = [];

        foreach($pidList as $type => $pid){
            $items[$type] = [$pid, ProductInformation::mediaById($pid)[0]->url];
        }

        $artworks = Artwork::where('parentid', '=', $user_id)->get();

        foreach($artworks as $k => $artwork){
            $artworks[$k]->url = \App\Media::getUrlById($artwork->mediaid);
        }

            return view('MyProducts.index', [
                'menu' => 'stores',
                'menuitem' => 'products',
                'user' => $user_id,
                'items' => $items,
                'artworks' => $artworks
            ]);
    }

    /*
     *
        /*$artwork_id = '';
        $artwork_name = '';
        if(isset($artwork_id)) { $artwork_id = $request->artwork_id; }
        if(isset($artwork_name)) { $artwork_name = $request->artwork_name; }
        $artworks = Artwork::all();
        //$artworks = Artwork::where('parentid', $user_id)->get();
        return view('addproducts',['menu'=>'stores','menuitem'=>'addproducts','artwork_id'=>$artwork_id,'artwork_name'=>$artwork_name,'artworks'=>$artworks]);/
$data = array("privateKey" => "password");
$data_string = json_encode($data);

$ch = curl_init(env('API_URL') . 'token');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);
$styles['operationCode'] = "";
$brands['operationCode'] = "";
$artworks['operationCode'] = "";
$result = curl_exec($ch);
$result = json_decode($result, true);
//      echo var_dump($result);die;
if ($result['operationCode'] == 200) {
    $token = $result['token'];
    $data = array("Authorization" => "Bearer " . $token);
    $data_string = json_encode($data);
    $ch1 = curl_init(env('API_URL') . 'api/master/getAllStyles');
    curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
            'Content-Length: ' . strlen($data_string))
    );

    $styles = curl_exec($ch1);
    $styles = json_decode($styles, true);
    $ch2 = curl_init(env('API_URL') . 'api/master/getAllBrands');
    curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
            'Content-Length: ' . strlen($data_string))
    );

    $brands = curl_exec($ch2);
    $brands = json_decode($brands, true);
    $ch3 = curl_init(env('API_URL') . 'api/artwork/getAllArtworks');
    curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch3, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch3, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $token,
            'Content-Length: ' . strlen($data_string))
    );

    $artworks = curl_exec($ch3);
    $artworks = json_decode($artworks, true);

    if (isset($brands['status'])) {
        $brands = array();
    }
    if (isset($styles['status'])) {
        //$styles['operationCode'] == 500;
        $styles = array();
    }
    if (isset($artworks['status'])) {
        //$artworks['operationCode'] == 500;
        $artworks = array();
    }
//       echo '<pre>';
//	print_r($brands);
//	print_r($artworks);
//	print_r($styles);
//       echo '</pre>';
//       die;

    /*$productStyles = DB::table(DB::raw("tbl_style_m as styles"))
        ->select(DB::raw("styles.*, media.full_url as url"))
        ->leftJoin(DB::raw("tbl_media_library as media"), function ($join) {
            $join->on(DB::raw("media.id"), "=", DB::raw("styles.image"));
        })
        ->get();
    */

    public function setPricing(Request $request)
    {
        $selectedproducts = array();
        if ($request->has('selectedproducts')) {
            $selectedproducts = explode(',', $request->selectedproducts);
        }
        return view('setpricing', ['selectedproducts' => $selectedproducts]);
    }
}
