<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/29/2015
 * Time: 9:16 AM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;

class CheckController extends Controller
{// This class will check messages from sever after send data..
    public function adminUserList($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }

        if($arrayMessageFromSever['code'] == 200) {
            return view('admin.user.list', ['arrayListUser' => $arrayMessageFromSever])->with('titlePage','Aiko | List User');
        }elseif($arrayMessageFromSever['code'] == 500) {
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 404) {
            return abort(404);
        }
        return view('errors.other');
    }

    public function adminUserCreate($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }

        if($arrayMessageFromSever['code'] == 200) {
            return redirect()->route('get.admin.user.create')->with('message_success','Chúc mừng bạn đã thêm người dùng thành công');
        }elseif($arrayMessageFromSever['code'] == 400){
            return abort(400, "Check register email failed");
        }elseif($arrayMessageFromSever['code'] == 500){
            return abort(500, "Create new user failed");
        }elseif($arrayMessageFromSever['code'] == -1){//"Create new identity failed"
            return view('errors.-1');
        }
        return view('errors.other');
    }

    public function adminUserUpdate($arrayMessageFromSever, $id){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }

        if($arrayMessageFromSever['code'] == 200) {
            return redirect()->route('get.admin.user.update', $id)->with('message_success','Chúc mừng bạn đã sửa người dùng thành công');
        }elseif($arrayMessageFromSever['code'] == 404){
            return abort(404);
        }elseif($arrayMessageFromSever['code'] == 500) {
            return abort(500);
        }
        return view('errors.other');
    }

    public function adminUserGetById($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }

        if($arrayMessageFromSever['code'] == 200) {
            return view('admin.user.update', ['dataUser' => $arrayMessageFromSever['data']])->with('titlePage','Aiko | Update User');
        }elseif($arrayMessageFromSever['code'] == 500) {
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 400) {
            return abort(400);
        }
        return view('errors.other');
    }

    public function adminGetAllUser($arrayMessageFromSever, $view){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }

        if($arrayMessageFromSever['code'] == 200) {
            return view($view, ['arrayListUser' => $arrayMessageFromSever['data']])->with('titlePage','Aiko | Activate User');
        }elseif($arrayMessageFromSever['code'] == 500) {
            return abort(500);
        }elseif($arrayMessageFromSever['code'] == 404) {
            return abort(404);
        }else{
            return view('errors.other');
        }
    }

    public function adminUserSearchList($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return view('admin.search.user.list',['arrayListUser' => $arrayMessageFromSever['data']]);
        }elseif($arrayMessageFromSever['code'] == 404){
            return abort(404);
        }
    }

    public function adminUserSearchActivate($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return view('admin.search.user.activate',['arrayListUser' => $arrayMessageFromSever['data']]);
        }elseif($arrayMessageFromSever['code'] == 404){
            return abort(404);
        }
    }

    public function adminUserSearchDeactivate($arrayMessageFromSever){
        if($result = $this->checkStatus401($arrayMessageFromSever) != false){
            return $result;
        }
        if($arrayMessageFromSever['code'] == 200) {
            return view('admin.search.user.deactivate',['arrayListUser' => $arrayMessageFromSever['data']]);
        }elseif($arrayMessageFromSever['code'] == 404){
            return abort(404);
        }
        return view('errors.other');  
    }
/*================== User =========================================================*/
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



}