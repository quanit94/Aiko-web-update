<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use Method;
use Connection;
class RestaurantController extends Controller
{

    private $request;
    private $check;
    public function __construct(Request $request){
        $this->request = $request;
        $this->check = new \App\Http\Controllers\Partner\CheckController();
    }

    public function getList(){
        $arrayMessageFromSever = Method::httpGet(Connection::restaurantGetList(), true);
        $result = $this->check -> restaurantGetList($arrayMessageFromSever);
        return $result;
    }

    public function getCreate(){
        return view('partner.restaurant.create')->with('titlePage','Aiko | Restaurant Create');
    }

    public function postCreate(){
        $dataInfoUser = Cookie::get("dataFromSever");
        $dataInfoRestAdd = $this->request->except('confirm','_token');
        
        if ($this->request->hasFile('cover_photo')) {
            $cover_photo = $dataInfoRestAdd['cover_photo'];
            if ($this->request->file('cover_photo')->isValid()){
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis').md5(md5(md5($dataInfoUser['data']['email'])))."-".$cover_photo->getClientOriginalName();
                $urlFile = url('public/partner/photo/restaurant');
                $this->request->file('cover_photo')->move($path.'/partner/photo/restaurant', $nameFile);
                $dataInfoRestAdd['cover_photo'] = $urlFile."/".$nameFile;
            }
        }
        /*========================== Validator ================================================================*/

        /*========================== Validator ================================================================*/
        $arrayMessageFromSever = Method::httpPost(Connection::addRestaurant(),$dataInfoRestAdd,true);
        $result = $this->check -> addRestaurant($arrayMessageFromSever);
        return $result;
    }

    public function getUpdate($id){
        $arrayMessageFromSever = Method::httpGet(Connection::restaurantGetList($id), true);
        // $result = $this->check -> restaurantGetList($arrayMessageFromSever);
        // return $result;
        echo "<pre>";
        print_r($arrayMessageFromSever);
        echo "</pre>";
    }

    public function postUpdate(){

    }

    public function postRemove(){
        $arrryID = $this->request -> input('remove');
        foreach ($arrryID as $idRestaurant => $value) {
            $arrayMessageFromSever = Method::httpPost(Connection::restaurantDelete($idRestaurant), false, true);
            $result = $this->check -> restaurantDelete($arrayMessageFromSever);
            if($result != 200){
                return $result;
            }
        }
        return redirect()->route('get.partner.restaurant.list')->with('message_success','Chúc mừng bạn đã xóa nhà hàng thành công');
    }
}