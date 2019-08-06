<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function doCurl($curl,$header,$data_string,$method){
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

    protected function getToken(){
        $data = array("privateKey" => "password");
        $data_string = json_encode($data);

        $header = ['Content-Type: application/json', 'Content-Lenght: ' . strlen($data_string)];

        $result = $this->doCurl(env('API_URL').'token', $header, $data_string, 'POST');

        /*
        $ch = curl_init(env('API_URL').'token');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        */

        return ($result['operationCode'] == 200) ? $result['token'] : null;
    }
}
