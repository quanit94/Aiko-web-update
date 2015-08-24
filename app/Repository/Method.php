<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/12/2015
 * Time: 8:18 AM
 */
// http://www.lornajane.net/posts/2011/posting-json-data-with-php-curl

namespace App\Repository;

use Illuminate\Http\Request;
use Cookie;

class Method {

    private function setHttpGetMethod($url, $credential = false){
        $dataFromSever = Cookie::get('dataFromSever');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if($credential){// Required credential user
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("aiko_token:".$dataFromSever['aiko_token'].""));
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false);
        $output=curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }

    private function setHttpPostMethod($url, $paramArray = false, $credential = false){// url must be string, params must be array.
        $dataFromSever = Cookie::get('dataFromSever');
        $postData = '';
        if(!$paramArray){
            $ch = curl_init();
            if($credential){// Required credential user
                curl_setopt($ch, CURLOPT_HTTPHEADER, array("aiko_token:".$dataFromSever['aiko_token'].""));
            }
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($ch,CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, count($postData));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

            $output=curl_exec($ch);

            curl_close($ch);
        }else{
            $data_string = json_encode($paramArray);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if($credential){// Required credential user
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string),
                        "aiko_token: ". $dataFromSever['aiko_token']
                    )
                );
            }else {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data_string),
                    )
                );
            }
            $output = curl_exec($ch);
            curl_close($ch);
        }
        return json_decode($output, true);
    }

    public function httpGet($url, $credential = false){// url must be string, params must be array.
        return $this->setHttpGetMethod($url, $credential);
    }

    public function httpPost($url, $paramArray = false, $credential = false){// url must be string, params must be array.
        return $this->setHttpPostMethod($url, $paramArray, $credential);
    }


    //    private function setHttpGetMethod($url, $paramArray = false, $credential = false){
//        $dataFromSever = Cookie::get('dataFromSever');
//        $params = "";
//        $ch = curl_init();
//        if($paramArray){// This case have any parameters;
//            foreach($paramArray as $key=>$value)
//                $params .= $key.'='.$value.'&';
//            $params = trim($params, '&');
//            curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
//        }else {// This case don't have parameter;
//            curl_setopt($ch, CURLOPT_URL, $url);
//        }
//
//        if($credential){// Required credential user
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array("aiko_token:".$dataFromSever['aiko_token'].""));
//        }
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//        curl_setopt($ch,CURLOPT_HEADER, false);
//        $output=curl_exec($ch);
//        curl_close($ch);
//        return json_decode($output, true);
//    }
}