<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function doCurl($curl,$header,$data_string,$method){
    	//echo "string";die;
    	$ch = curl_init($curl);                                             
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);               //curl_setopt($ch, CURLOPT_UPLOAD, TRUE);                              
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 

        $result = curl_exec($ch);
        
        $result = json_decode($result,true);

        return $result;                  
    }
}
