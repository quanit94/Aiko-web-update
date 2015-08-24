<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/29/2015
 * Time: 9:16 AM
 */
namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;

class CheckController extends Controller
{// This class will check messages from sever after send data..
/*================== Restaurant =========================================================*/
    public function addRestaurant($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return redirect()->route('get.partner.restaurant.create')->with('message_success','Chúc mừng bạn đã thêm cửa hàng thành công');
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 404){ // "Not found."
            return abort(404);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }   
        return view('errors.other');  
    }

    public function restaurantGetList($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return view('partner.restaurant.list',['arrayListRestaurant' => $arrayMessageFromSever['data']])->with('titlePage','Aiko | List Restaurant');
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400, 'Not enough input param value');
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500, 'Database exception');
        }

        return view('errors.other');   
    }

    public function restaurantDelete($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 404){ // Database exception
            return abort(404);
        }elseif($arrayMessageFromSever['code'] == 403){ // Database exception
            return abort(403);
        }

        return view('errors.other');   
    }
/*================== End Restaurant =========================================================*/

/*================== Review =========================================================*/
    public function reviewGet($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }

        return view('errors.other');   
    }
/*================== End Review =========================================================*/

/*================== Promotion =========================================================*/
    public function getPromoOfRestaurant($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return view('partner.restaurant.list', ['arrayListRestaurant'=>$arrayMessageFromSever['data']])->with('titlePage','Aiko | List Restaurant');
        }elseif($arrayMessageFromSever['code'] == 400){
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){
            return abort(500);
        }

        return view('errors.other');   
    }

    public function getPromotionById($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){
            return abort(500);
        }

        return view('errors.other');   
    }

    public function deletePromotion($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 403){ // Database exception
            return abort(403);
        }

        return view('errors.other');   
    }

    public function updatePromotion($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 403){ // Database exception
            return abort(403);
        }

        return view('errors.other');   
    }

    public function addPromotion($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return 200;
        }elseif($arrayMessageFromSever['code'] == 400){ // "Not have enough parameters"
            return abort(400);
        }elseif($arrayMessageFromSever['code'] == 500){ // Database exception
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 403){ // Database exception
            return abort(403);
        }
        return view('errors.other');
    }

/*================== End Promotion =========================================================*/
    public function checkStatus401($arrayMessageFromSever){
        if(isset($arrayMessageFromSever['status']) && $arrayMessageFromSever['status'] == 401)
        {
            $cookie = Cookie::forget('dataFromSever');// Xóa toàn bộ session(lưu thông tin dữ liệu của người dùng)
            session_start();
            session_destroy();
            return redirect()->route('get.auth.auth.login')->withCookie($cookie);// Quay lại trang đăng nhập.
        }
        return false;
    }
/*================== Promotion =========================================================*/
    
}