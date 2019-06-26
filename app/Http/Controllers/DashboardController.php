<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
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
        return view('dashboard',['storefronts'=>$storefronts]);
    }

    public function myAccount() {

        $user_id = Auth::user()->id;
        
        $data = array("privateKey" => "password");                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                     
        $ch = curl_init(env('API_URL')."token");                                             
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
                                                                                                                     
        $result = curl_exec($ch);
        $result = json_decode($result,true);
        //echo var_dump($result);
        if($result['operationCode'] == 200) {
            $token = $result['token']; 
            $data = array("Authorization" => "Bearer ".$token);                                                                    
        $data_string = json_encode($data);                                                                                   
                                                                                                                     
        $ch = curl_init(env('API_URL')."api/users/getUserDetailsById/".$user_id);                                             
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token,                                                                                
        'Content-Length: ' . strlen($data_string))                                                                       
        );   

        $result = curl_exec($ch);
        $result = json_decode($result,true);
        //var_dump($result);

        if($result['operationCode'] == 200) { 
            return view('account',['menu'=>'account','menuitem'=>'myaccount','user_details' => $result, 'token'=>$token]);  
            //echo $result['properties']['userName'];  
        } else {
            //error 
        }

        } else {
            //error or redirection
        }
        
        //
    }
}
