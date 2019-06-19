<?php

namespace App\Utility;

use Illuminate\Http\Request;
use Cookie;
class GenerateTokenUtility
{
    static function generateToken() {

        $data = array("privateKey" => env('API_SECRET_KEY'));                                                                    
        $data_string = json_encode($data);                                                                                   
        if(null !== @$_COOKIE['token']) {
            //dd($_COOKIE['token']);
            return $_COOKIE['token'];
        } else {                                                                                                            
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
            if(isset($result)) {
                if($result['operationCode'] == 200) {
                    setcookie('token', $result['token'], time() + (86400 * 30), "/"); // 86400 = 1 day
                    return $result['token'];
                } else {
                    return $result;
                }
            }
        }

        // dd($result);
    }

    static function updateToken() {
        $data = array("privateKey" => env('API_SECRET_KEY'));                                                                    
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
        if($result['operationCode'] == 200) {
            return $result['token'];
        }
    }

    static function getHeaders($toekn) {
        $header = array("Authorization" => "Bearer ".$toekn, "Content-Type" => "application/json"); 
        return $header;
    }

}