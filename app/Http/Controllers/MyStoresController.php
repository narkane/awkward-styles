<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
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
        return view('createstore',['storefronts'=>$storefronts]);
    }
    
    public function createStore()
    {
        $user_id = Auth::user()->id;
        $storefronts = DB::SELECT('select id,name from tbl_store_front where user_id=? order by id DESC LIMIT 4',[$user_id]);
        return view('createstore',['menu'=>'stores','menuitem'=>'createstore','storefronts'=>$storefronts]);
    }

    public function addArtWork()
    {
        $user_id = Auth::user()->id;
        $data = array("privateKey" => "password");                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                     
        $ch = curl_init(env('API_URL').'token');                                             
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
                                                                                                                   
        $result = curl_exec($ch);
        $result = json_decode($result,true);
       //echo var_dump($result);die;
        if($result['operationCode'] == 200) {
        $token = $result['token'];
        $categories = DB::SELECT('select id,name from tbl_art_category where type=? and active=?',['templates',1]);
        $artworks = DB::SELECT('select id,artname,artwork,DATE_FORMAT(mtime,"%d-%M-%Y") as date from tbl_art_work where parentid=? order by id DESC LIMIT 8',[$user_id]);
        $royaltyfees = DB::SELECT('select id,value,name from tbl_royalty_fee order by id DESC');
        return view('myartworks',['menu'=>'stores','menuitem'=>'artwork','categories'=>$categories,'royaltyfees'=>$royaltyfees, 'artworks'=> $artworks, 'token'=>$token, 'user'=>$user_id]);
        } else {
             
        } 
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
        $store_name = !empty(isset($_POST['store_name']))?$_POST['store_name']:'';
        $store_description = !empty(isset($_POST['store_description']))?$_POST['store_description']:'';
        $store_url = !empty(isset($_POST['store_url']))?$_POST['store_url']:'';
        $store_tags = !empty(isset($_POST['store_tags']))?$_POST['store_tags']:'';
        $store_logo = !empty(isset($_POST['store_logo']))?$_POST['store_logo']:'';
        $store_banner = !empty(isset($_POST['store_banner']))?$_POST['store_banner']:'';
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
            
        $store_saved = DB::INSERT('insert into tbl_store_front(name,description,type,url,logo_path,banner_image_path,user_id,mtime,ctime,editor) values (?,?,?,?,?,?,?,?,?,?)',[$store_name,$store_description,'artwork',$store_url,$logo,$banner,$user_id,now(),now(),$user_id]);
        
        //$data = $request->all();
        //echo json_encode($data);
        if($store_saved) {
            $request->session()->flash('message.level', 'info');
            $request->session()->flash('message.content', 'Store data added successfully...');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Unable to add store, Please try again...');
        }        
        return redirect('createstore');
    }

    public function saveArtWork(Request $request)
    {
        // dd($request);
        $user_id = Auth::user()->id;
        $data = array("privateKey" => "password");
        $data_string = json_encode($data); 
        $header = array('Content-Type: application/json',
         'Content-Length: ' . strlen($data_string));                                                                               
        $result = $this->doCurl(env('API_URL','http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/').'token',$header,$data_string,'POST');
        if($result['operationCode'] == 200) {
        $token = $result['token']; 
        $filename = $_FILES['updated_artwork']['name'];
        $filedata = $_FILES['updated_artwork']['tmp_name'];
        $filesize = $_FILES['updated_artwork']['size'];
        $filetype = $_FILES['updated_artwork']['type'];
        $fields = [
          'files' => new \CurlFile($filedata, $filetype, 'filename.png'),
          'fileNames' => $filename
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8080",
          CURLOPT_URL => env('API_URL','http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/')."api/media/upload",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
         CURLOPT_POSTFIELDS=>$fields,
          CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$token,
            "cache-control: no-cache",
            "content-type: multipart/form-data"
          ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response,true);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          Session()->flash('saveArtWork_img_error', 'Image not upload!');
          return redirect('addartwork/');
        } else {
          $img_id = $response['properties'];
          //print_r($img_id);die;
            $postData = array(
            "artName" => $request->artwork_name,
            "artwork"=> "Test aaa",
            "artworkCategoryId"=> 19,
            "description"=> $request->artwork_description,
            "editor"=> 2,
            "isAccepted"=> 0,
            "isAwkwardstyle"=> $request->channel_awkwardstyle?1:0,
            "isIndividual"=> $request->channel_individual?1:0,
            "isPending"=> 1,
            "isPrivate"=> $request->private_artwork,
            "isRejected"=> 0,
            "isThirdPartyEcommerce"=> $request->channel_thirdEcommerce?1:0,
            "isThirdPartyMarketPlace"=> $request->channel_thirdMarketPlace?1:0,
            "mediaId"=> array(
              "id"=> $img_id
            ),
            "parentId"=> $user_id,
            "reason"=> "test three reason",
            "royaltyFee"=> $request->royalty_fees,
            "tagName"=> $request->artwork_tags,
            "suitableAudience" => $request->suitable_audience,
          );

          $post_data_string =    json_encode($postData);  
          $header_post = array(
          'Content-Type: application/json',
          'Authorization:Bearer '.$token,                                        
          'Content-Length: ' . strlen($post_data_string));

          $result_curl = $this->doCurl(env('API_URL','http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/').'api/artwork/save',$header_post,$post_data_string,'POST');
          // print_r($result_curl);die;
          Session()->flash('saveArtWork_succ', 'Successfully save artwork!');
          return redirect('addartwork/');
        }
        
        }
        $artwork_name = !empty(isset($_POST['artwork_name']))?$_POST['artwork_name']:'';
        $artwork_description = !empty(isset($_POST['artwork_description']))?$_POST['artwork_description']:'';
        $updated_artwork = !empty(isset($_POST['updated_artwork']))?$_POST['updated_artwork']:'';
        $artwork_tags = !empty(isset($_POST['artwork_tags']))?$_POST['artwork_tags']:'1';
        $artwork_category = !empty(isset($_POST['artwork_category']))?$_POST['artwork_category']:'';
        $suitable_audience =  1; //!empty(isset($_POST['suitable_audience']))?$_POST['suitable_audience']:'';
        $royalty_fees = !empty(isset($_POST['royalty_fee']))?$_POST['royalty_fee']:'1';

        $characters = '019A26nPRe3js3W69CrGF8kKXvvmYtT4zNGqicXRjvuAnmmbvPZXu5yRJVWXYZ';
        $charactersLength = 20;
        $randomString = '';
        for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        if(Input::hasFile('updated_artwork')){
        $file = Input::file('updated_artwork');
            $file->move('./images/products/', $randomString.".png");
           $image = "/images/products/".$randomString.".png";
        }
            
        $artwork_saved = DB::table('tbl_art_work')->insertGetId(array('parentid'=>$user_id, 'artname' => $artwork_name, 'artwork' => $image, 'description' => $artwork_description, 'royaltyfee' => intval($royalty_fees), 'allowed_audience' => $suitable_audience, 'mtime' => now(), 'ctime' => now(), 'editor' => $user_id));
        
        //$data = $request->all();
        //echo json_encode($data);
        if($artwork_saved) {
            DB::INSERT('insert into tbl_artwork_status(artwork_id,is_accepted,is_rejected,is_pending,ctime,mtime) values(?,?,?,?,?,?)',[$artwork_saved,0,0,1,now(),now()]);
            $request->session()->flash('message.level', 'info');
            $request->session()->flash('message.content', 'Artwork added successfully...');
        } else {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'Unable to add artwork, Please try again...');
        }
        return redirect('addproducts/');
    }
}