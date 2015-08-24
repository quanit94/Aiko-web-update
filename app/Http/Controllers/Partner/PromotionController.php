<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Method;
use Input;
use Connection;
class PromotionController extends Controller
{

    private $request;
    private $check;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->check = new \App\Http\Controllers\Partner\CheckController();
    }

    public function getList($idRestaurant) {
    	$arrayMessageFromSever = Method::httpGet(Connection::getPromotionOfRestaurant($idRestaurant), true);
        return view('partner.promotion.list', ['ArrayListPromotion' => $arrayMessageFromSever, 'titlePage' => 'Promotion in Restaurant', 'idRestaurant' => $idRestaurant]);
    }

    public function getGet($idPromotion) {
        $arrayMessageFromSever = Method::httpGet(Connection::getPormotionById($idPromotion), true);
        echo "<pre>";
            print_r($arrayMessageFromSever);
        echo "</pre>";
    }

    public function getCreate($idRestaurant) {
        $arrayMessageFromSever = Method::httpGet(Connection::getPromotionOfRestaurant($idRestaurant), true);
        if(!empty($arrayMessageFromSever['data']))
            return redirect()->route('get.partner.promotion.list', $idRestaurant)->with('flash_error', 'Each Restaurant has only one of campaign promotion');
        return view('partner.promotion.create', ['titlePage' => 'Add Promotion', 'idRestaurant' => $idRestaurant]);
    }

    public function postCreate() {
        $dataInfoUser = Cookie::get("dataFromSever");// get data cookie 

        $dataInfoProAdd = $this->request->except('confirm','_token'); 
        $idRestaurant = $dataInfoProAdd['item_id'];

        if ($this->request->hasFile('img')) { // neu co file trong input img
            $img = $dataInfoProAdd['img'];
            if ($this->request->file('img')->isValid()){
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis').md5(md5(md5($dataInfoUser['data']['email'])))."-".$img->getClientOriginalName();
                $urlFile = url('public/partner/photo/promotion');
                $this->request->file('img')->move($path.'/partner/photo/promotion', $nameFile);
                $dataInfoProAdd['img'] = $urlFile."/".$nameFile;
            }
        }
        
        $arrayMessageFromSever = Method::httpPost(Connection::addPromotion(), $dataInfoProAdd, true);
        // echo "<pre>";
        //     var_dump($dataInfoProAdd);
        // echo "</pre>";
        // die();
        $result = $this->check->addPromotion($arrayMessageFromSever);
        return redirect()->route('get.partner.promotion.list', $idRestaurant)->with('flash_success', 'Add Promotion Successful!');
    }
    public function getUpdate($idPromotion) {
        $arrayMessageFromSever = Method::httpGet(Connection::getPromotionById($idPromotion), true);
        $idRestaurant = $arrayMessageFromSever['data']['item_id'];

        return view('partner.promotion.update', ['titlePage' => 'Update Promotion', 'idRestaurant' => $idRestaurant, 'InfoPromotion' => $arrayMessageFromSever['data']]);
    }

    public function postUpdate($idPromotion) {
        $dataInfoUser = Cookie::get("dataFromSever");// get data cookie 

        $dataInfoUpdate = $this->request->except('confirm','_token'); 
        $idRestaurant = $dataInfoUpdate['item_id'];
        // echo "<pre>";
        //     var_dump($dataInfoUpdate);
        // echo "</pre>";
        // die();
        if ($this->request->hasFile('img')) {
            $img = $dataInfoUpdate['img'];
            echo $img;
            if ($this->request->file('img')->isValid()){
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis').md5(md5(md5($dataInfoUser['data']['email'])))."-".$img->getClientOriginalName();
                $urlFile = url('public/partner/photo/promotion');
                $this->request->file('img')->move($path.'/partner/photo/promotion', $nameFile);
                $dataInfoUpdate['img'] = $urlFile."/".$nameFile;

            }
        }

        // if ($this->request->input('img')->isValid()) {
        //     $destinationPath = public_path(); // upload path
        //     $extension = $this->request->input('img')->getClientOriginalExtension(); // getting image extension
        //     $now = new \DateTime('now'); // call time now
        //     $fileName = $now->format('YmdHis').md5($dataInfoUser['data']['email']).rand(11111,99999).'.'.$extension; // renameing image
        //     $this->request->input('img')->move($destinationPath.'/partner/photo/promotion', $fileName); // uploading file to given path
        //     $urlFile = url('public/partner/photo/promotion');
        //     $dataInfoUpdate['img'] = $urlFile."/".$fileName;
        //     echo $dataInfoUpdate['img'];
        // }

        // die();
        $arrayMessageFromSever = Method::httpPost(Connection::updatePromotion($idPromotion), $dataInfoUpdate, true);
        
        $result = $this->check->updatePromotion($arrayMessageFromSever);
        return redirect()->route('get.partner.promotion.list', $idRestaurant);
    }

    public function postRemove($idRestaurant) {
        $idPromotion = $this->request->input('remove');
        
        foreach ($idPromotion as $key => $value) {
            $arrayMessageFromSever = Method::httpPost(Connection::deletePromotion($key), false, true);
            $result = $this->check->deletePromotion($arrayMessageFromSever);
               
        }
        return redirect()->route('get.partner.promotion.list', $idRestaurant)->with('flash_success', 'Delete Promotion Successful!');
    
    }

}