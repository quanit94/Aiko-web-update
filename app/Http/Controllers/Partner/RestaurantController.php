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
        $arrayMessageFromSever = Method::httpGet(Connection::getRestaurantById($id), true);

        $result = $this->check->getRestaurantById($arrayMessageFromSever);
        if($result == 200)
            return view('partner.restaurant.update', ['restaurantOld' => $arrayMessageFromSever, 'titlePage' => 'Aiko | Update Restaurant']);
        else
            return redirect()->route('get.partner.restaurant.list')->with('message_error', 'Error while send data, please again!');
       
    }

    public function postUpdate($id){
        $dataInfoUser = Cookie::get("dataFromSever");

        $oldData = Method::httpGet(Connection::getRestaurantById($id), true);
        $dataInfoRestUpdate = $this->request->except('confirm', '_token');
        if ($this->request->hasFile('cover_photo')) {
            $cover_photo = $dataInfoRestUpdate['cover_photo'];
            if ($this->request->file('cover_photo')->isValid()) {
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis') . md5(md5(md5($dataInfoUser['data']['email']))) . "-" . $cover_photo->getClientOriginalName();
                $urlFile = url('public/partner/photo/restaurant');
                $this->request->file('cover_photo')->move($path . '/partner/photo/restaurant', $nameFile);
                $dataInfoRestUpdate['cover_photo'] = $urlFile . "/" . $nameFile;
            }
        }

        $dataInfoRestUpdate['owner_id'] = $dataInfoUser['data']['_id'];
        if ($this->request->hasFile('menus')) {
            $menus = $dataInfoRestUpdate['menus'];
            if ($this->request->file('menus')->isValid()) {
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis') . md5(md5(md5($dataInfoUser['data']['email']))) . "-" . $menus->getClientOriginalName();
                $urlFile = url('public/partner/photo/restaurant');
                $this->request->file('menus')->move($path . '/partner/photo/restaurant', $nameFile);
                $dataInfoRestUpdate['menus'] = $urlFile . "/" . $nameFile;
            }
        }
        
        if ($this->request->hasFile('photos')) {
            $photos = $dataInfoRestUpdate['photos'];
            if ($this->request->file('photos')->isValid()) {
                $path = public_path();
                $now = new \DateTime('now');
                $nameFile = $now->format('YmdHis') . md5(md5(md5($dataInfoUser['data']['email']))) . "-" . $photos->getClientOriginalName();
                $urlFile = url('public/partner/photo/restaurant');
                $this->request->file('photos')->move($path . '/partner/photo/restaurant', $nameFile);
                $dataInfoRestUpdate['photos'] = $urlFile . "/" . $nameFile;
            }
        }
        
        
        
        $arrayMessageFromSever = Method::httpPost(Connection::updateRestaurant($id), $dataInfoRestUpdate, true);
        return redirect()->route('get.partner.restaurant.list')->with('message_success', 'Edit Restaurant Successful!');
//        $result = $this->check->updateRestaurant($arrayMessageFromSever);
//        return $result;
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