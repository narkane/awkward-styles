<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Artwork;

class ToolController extends Controller
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
	
    
    
    public function index($productId)
    {
              $user_id = Auth::user()->id;
        /*$artwork_id = '';
        $artwork_name = '';
        if(isset($artwork_id)) { $artwork_id = $request->artwork_id; }
        if(isset($artwork_name)) { $artwork_name = $request->artwork_name; } 
        $artworks = Artwork::all();
        //$artworks = Artwork::where('parentid', $user_id)->get();
        return view('addproducts',['menu'=>'stores','menuitem'=>'addproducts','artwork_id'=>$artwork_id,'artwork_name'=>$artwork_name,'artworks'=>$artworks]);*/
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
          $styles['operationCode']   = "";
          $brands['operationCode']   = "";
          $artworks['operationCode'] = "";                                                                                                              
          $result = curl_exec($ch);
          $result = json_decode($result,true);
  //      echo var_dump($result);die;
          if($result['operationCode'] == 200) {
              $token = $result['token']; 
              $data = array("Authorization" => "Bearer ".$token);                                                                    
          $data_string = json_encode($data);                                                                                                                                                                                         
          $ch1 = curl_init(env('API_URL').'api/master/getAllStyles');                                             
          curl_setopt($ch1, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
          curl_setopt($ch1, CURLOPT_POSTFIELDS, $data_string);                                                                  
          curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);                                                                      
          curl_setopt($ch1, CURLOPT_HTTPHEADER, array(                                                                          
          'Content-Type: application/json',
          'Authorization: Bearer ' . $token,                                                                                
          'Content-Length: ' . strlen($data_string))                                                                       
          );   
  
          $styles = curl_exec($ch1);
          $styles = json_decode($styles,true);
          $ch2 = curl_init(env('API_URL').'api/master/getAllBrands');                                             
          curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
          curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string);                                                                  
          curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);                                                                      
          curl_setopt($ch2, CURLOPT_HTTPHEADER, array(                                                                          
          'Content-Type: application/json',
          'Authorization: Bearer ' . $token,                                                                                
          'Content-Length: ' . strlen($data_string))                                                                       
          );   
  
          $brands = curl_exec($ch2);
          $brands = json_decode($brands,true);
          $ch3 = curl_init(env('API_URL').'api/artwork/getAllArtworks');                                             
          curl_setopt($ch3, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
          curl_setopt($ch3, CURLOPT_POSTFIELDS, $data_string);                                                                  
          curl_setopt($ch3, CURLOPT_RETURNTRANSFER, true);                                                                      
          curl_setopt($ch3, CURLOPT_HTTPHEADER, array(                                                                          
          'Content-Type: application/json',
          'Authorization: Bearer ' . $token,                                                                                
          'Content-Length: ' . strlen($data_string))                                                                       
          );   
  
          $artworks = curl_exec($ch3); 
          $artworks = json_decode($artworks,true);
         
      if(isset($brands['status'])){
          $brands = array();
      }
      if(isset($styles['status'])){
          //$styles['operationCode'] == 500;
          $styles = array();
      }
      if(isset($artworks['status'])){
          //$artworks['operationCode'] == 500;
          $artworks = array();
      }
      // $product = $this->mockupgen->index($productId);
      //  dd($product);//[0]->image_url);
      // $tokenGen = array(
      //   'token'=>GenerateTokenUtility::generateToken(),
      //   'header'=>GenerateTokenUtility::getHeaders(GenerateTokenUtility::generateToken())
      // );
      // dd($tokenGen);
      // return view('products',compact('tokenGen'));
      
      /////////////////////////////
      $q = $productId;
      $proddy = DB::select(' select * from tbl_products where id = '.$q);
      //  $tags =[];
      //  foreach($termIDs as &$id) {
        //      // echo json_encode($id->category_id);
        //      $query = null;
        //      $query = DB::select(' select * from tbl_products where FIND_IN_SET("'.$id->category_id.'", categoryId) > 0');
        //      // console.log($termIDs);
        //      // console.log(DB::select(' select label from tbl_products where FIND_IN_SET('.$id.', categoryId) > 0'));
        //      if(count($query) > 0) {
          //          array_push($tags, $query); 
          //          //echo json_encode($tags);
          //      }
          //  }
          
          // $product = $this->mockupgen->index($productId);
          //  dd($product);//[0]->image_url);
          // return view('thetool', ['request' => json_encode($proddy), 'product_id' => $productId, compact('tokenGen')]);
          return view('thetool', ['request' => json_encode($proddy), 'product_id' => $productId, 'menu'=>'stores','menuitem'=>'products','styles' => $styles, 'brands'=>$brands, 'artworks'=>$artworks, 'token'=>$token, 'user'=>$user_id]);
        }
      }
    }