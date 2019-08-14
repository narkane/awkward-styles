<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\URL;
use Session;
use Illuminate\Support\Facades\Input;

class MyStoresController extends Controller
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
    public function index()
    {
        $user_id = Auth::user()->id;
        $storefronts = DB::SELECT('select id,name from tbl_store_front where user_id=? order by id DESC LIMIT 4',[$user_id]);
        return view('createstore',['storefronts'=>$storefronts,'token'=>$this->getToken()]);
    }
    
    public function createStore()
    {
        $user_id = Auth::user()->id;
        $storefronts = DB::SELECT('select id,name from tbl_store_front where user_id=? order by id DESC LIMIT 4',[$user_id]);
        return view('createstore',['menu'=>'stores','menuitem'=>'createstore','storefronts'=>$storefronts]);
    }

    public function editStore(Request $request, $id){
        $user_id = Auth::user()->id;
        $storefronts = DB::SELECT('select * from tbl_store_front where user_id=? AND id=? order by id DESC LIMIT 4',[$user_id,$id]);

        $tags = DB::table("tbl_tag")
                ->where("user_id","=",$user_id)
                ->where("tagged_id", "=", $id)
                ->where('type', '=', '2')
                ->get();

        return view('createstore',['menu'=>'stores','menuitem'=>'createstore','storefronts'=>$storefronts, 'tags' => $tags]);
    }


    public function addArtWork(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = array("privateKey" => "password");                                                                    
        $data_string = json_encode($data);
        $categories = DB::SELECT('select id,name from tbl_art_category where type=? and active=?',['templates',1]);
        $artworks = DB::SELECT('select id,artname,artwork, DATE_FORMAT(mtime,"%d-%M-%Y") as date from tbl_art_work where parentid=? order by id DESC LIMIT 8',[$user_id]);
        $royaltyfees = DB::SELECT('select id,value,name from tbl_royalty_fee order by id DESC');
        return view('myartworks',[
            'menu'=>'stores',
            'menuitem'=>'artwork',
            'categories'=>$categories,
            'royaltyfees'=>$royaltyfees,
            'artworks'=> $artworks,
            'token'=>$this->getToken(),
            'user'=>$user_id]);

    }

    public function artworkmanagement() {
        return view('artworkmanagement');
    }

    public function tagSuggestions(Request $request) {
      $q = $request->id;
      $tags = DB::select('select name as tag from tbl_tag where name like "%'.$q.'%"'); 
      if(count($tags)>0) {
        echo json_encode($tags);
      }
    }
    
    public function saveStore(Request $request)
    {
        $user_id = Auth::user()->id;
        $store_name = ($request->has('store_name')) ? $request->input('store_name') : '';
        $store_description = ($request->has('store_description')) ? $request->input('store_description') : '';
        $store_url = ($request->has('store_url')) ? $request->input('store_url') : '';
        $store_tags = ($request->has('tag-suggestions')) ? $request->input('tag-suggestions') : null;
        $store_logo = ($request->has('store_logo')) ? $request->file('store_logo') : null;
        $store_banner = ($request->has('store_banner')) ? $request->file('store_banner') : null;
        $store_id = ($request->has('store_id')) ? $request->input('store_id') : 0;

        $characters = '019A26nPRe3js3W69CrGF8kKXvvmYtT4zNGqicXRjvuAnmmbvPZXu5yRJVWXYZ';
        
        $banner = '/images/images/Sample-img.jpg';
        $logo = '/images/images/Sample-img.jpg';

        $charactersLength = 20;
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if(Input::hasFile('store_logo')){
        $file = Input::file('store_logo');
           $file->move('./images/products/', "store_logo_".$randomString.".png");
           $logo = "/images/products/store_logo_".$randomString.".png";
           
        }

        if(Input::hasFile('store_banner')){
        $file = Input::file('store_banner');
           $file->move('./images/products/', "store_banner_".$randomString.".png");
           $banner = "/images/products/store_banner_".$randomString.".png";
           
        }

        // Create Entry
        $entry = [
            "name" => $store_name,
            "description" => $store_description,
            "type" => 'artwork',
            "url" => $store_url,
            'mtime' => now(),
            'ctime' => now(),
            'editor' => $user_id
        ];

        if($store_id == 0) {
            $entry['logo_path'] = $logo;
            $entry['banner_image_path'] = $banner;
        } else {
            if(!is_null($store_logo)){
                $entry['logo_path'] = $logo;
            }
            if(!is_null($store_banner)){
                $entry['banner_image_path'] = $banner;
            }
        }

        $store_saved = DB::table('tbl_store_front')
                        ->updateOrInsert(
                            ['user_id' => $user_id, 'id' => $store_id],
                            $entry
        );

        if($store_saved) {
            $request->session()->flash('message.level', 'info');
            $request->session()->flash('message.content', 'Store data added successfully...');

            if($store_id == 0){
                $store_id = $store_saved->id;
            }

            $allTags = json_decode($store_tags);

            $originalTags = DB::table("tbl_tag")
                ->where("user_id","=",$user_id)
                ->where("tagged_id", "=", $store_id)
                ->where('type', '=', '2')
                ->get();

            /**
             * If the tag has been removed, we need to remove it from the databse
             */
            foreach($originalTags as $t){
                $exist = false;
                foreach($allTags as $s){
                    if($t->name == $s) $exist = true;
                }
                if(!$exist){
                    DB::table('tbl_tag')
                        ->where('user_id', '=', $user_id)
                        ->where('tagged_id', '=', $store_id)
                        ->where('name', '=', $t->name)
                        ->where('type', '=', '2')
                        ->delete();
                }
            }

            foreach($allTags as $sTag) {
                if($sTag != null && !empty($sTag) && !ctype_space($sTag)) {
                    $tags = DB::table('tbl_tag')
                        ->updateOrInsert(
                            ['user_id' => $user_id, 'tagged_id' => $store_id, 'name' => $sTag, 'type' => '2'], [
                                'editor' => Auth::user()->email
                            ]
                        );
                }
            }

        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Unable to add store, Please try again...');
        }
        return redirect('createstore');
    }

    public function saveArtWork(Request $request)
    {

        /**
         * TODO: ADD artwork DPI/PPI for correct resolutions
         */
        //$dpi = $this->getPPI($file->getReaPath());

        $validated = $request->validate([
            'artwork_name' => 'required|max:255',
            'artwork_description' => 'required',
            'suitable_audience' => 'required',
            'royalty_fees' => 'required',
            'remember' => 'required',
            'updated_artwork' => 'required|file|image|max:10000000'
        ]);

        $artwork_name = $request->input('artwork_name');
        $artwork_description = $request->input('artwork_description');
        $audience = $request->input('suitable_audience');
        $private = ($request->has('private_artwork')) ? 1 : 0;
        $royalty_fees = $request->input('royalty_fees');
        $remember = $request->input('remember');
        $updated_artwork = $request->file('updated_artwork');
        $individual = ($request->has('channel_individual')) ? 1 : 0;
        $awkwardstyle = ($request->has('channel_awkwardstyle')) ? 1 : 0;
        $thirdMarketPlace = ($request->has('channel_thirdMarketPlace')) ? 1 : 0;
        $thirdECommerce = ($request->has('channel_thirdEcommerce')) ? 1 : 0;
        $artwork_category = ($request->has('artwork_category')) ? $request->input('artwork_category') : 0;
        $artwork_tags = ($request->has('artwork_tags')) ? $request->input('artwork_tags') : null;

        $fileSize = $updated_artwork->getSize();
        list($width, $height) = getimagesize($updated_artwork->getRealPath());

        $user_id = Auth::user()->id;

        $characters = '019A26nPRe3js3W69CrGF8kKXvvmYtT4zNGqicXRjvuAnmmbvPZXu5yRJVWXYZ';
        $charactersLength = 20;
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $updated_artwork->move('./images/products/', $randomString.".png");
        $image = "/images/products/".$randomString.".png";
        $full_url = URL::to("/") . $image;

        // Insert Image into DB
        $mediaID = DB::table('tbl_media_library')
                ->insertGetId([
                    'full_url' => $full_url,
                    'type' => 'image',
                    'mtime' => now(),
                    'ctime' => now(),
                    'editor' => $user_id
                ]);
            
        $artwork_saved = DB::table('tbl_art_work')
            ->insertGetId(
                ['parentid'=>$user_id,
                    'artname' => $artwork_name,
                    'artwork' => $image,
                    'description' => $artwork_description,
                    'royalty_fee' => intval($royalty_fees),
                    'suitable_audience' => $audience,
                    'mediaid' => $mediaID,
                    'is_private' => $private,
                    'is_individual' => $individual,
                    'is_awkwardstyle' => $awkwardstyle,
                    'is_thirdparty_marketplace' => $thirdMarketPlace,
                    'is_thirdparty_ecommerce' => $thirdECommerce,
                    'artwork_category_id' => $artwork_category,
                    'tag_name' => $artwork_tags,
                    'file_size' => $fileSize,
                    'height' => $height,
                    'width' => $width,
                    'resolution' => $width . " x " . $height,
                    'mtime' => now(),
                    'ctime' => now(),
                    'editor' => $user_id
                ]);
        
        //$data = $request->all();
        //echo json_encode($data);
        if($artwork_saved) {
            $request->session()->flash('message.level', 'info');
            $request->session()->flash('message.content', 'Artwork added successfully...');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Unable to add artwork, Please try again...');
        }
        return redirect('addproducts/');
    }

    private function getPPI($file){
        list($w, $h) = getimagesize($file);
        $inch = 0.0104166667;

        $inch_w = $w * $inch;
        $inch_h = $h * $inch;

        $wDPI = $w / $inch_w;
        $hDPI = $h / $inch_h;

        return [$wDPI,$hDPI];
    }
}