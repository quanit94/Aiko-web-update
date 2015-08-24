<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/24/2015
 * Time: 10:59 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Message;
use Method;
use Rule;
use Connection;
use Cookie;

class UserController extends Controller
{
    private $request;
    private $check;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->check = new \App\Http\Controllers\Admin\CheckController();
    }
    public function getList($currentPage = 1)
    {
        $dataFromSever = Method::httpGet(Connection::adminUserList($currentPage),true);
        $result = $this->check -> adminUserList($dataFromSever);
        return $result;
    }

    public function getGet($id)
    {
        $stringJsonReturnedFormSeverAfterSend = Method::httpGet(Connection::adminUserGetById($id), false, true);
        $arrayMessageFromSever = json_decode($stringJsonReturnedFormSeverAfterSend, true);
        // view at here..
        echo $id;
        echo "<pre>";
        print_r($arrayMessageFromSever);
        echo "</pre>";
    }

    public function getCreate()
    {
        return view('admin.user.create')->with('titlePage','Aiko | Create User');
    }

    public function postCreate()
    {
        $dataUserAfterInput = $this->request->all();
        // Validator at here
        $validator = Validator::make($dataUserAfterInput, Rule::adminUserAdd(), Message::vietnamese());
        if($validator->fails())
        {
//            if(!$this->request->has('admin') && !$this->request->has('partner')){
//                return redirect()->route('get.admin.user.create')->withErrors($validator)->with('message_error','Vui lòng chọn quyền cho người dùng.')->withInput($this->request->except('password','repassword'));
//            }
            return redirect()->route('get.admin.user.create')->withErrors($validator)->withInput($this->request->except('password','repassword'));
        }
        
        $dataUserForInsert = array(
            'name'      =>  $dataUserAfterInput['name'],
            'email'     =>  $dataUserAfterInput['email'],
            'password'  =>  $dataUserAfterInput['password'],
            'role'      =>  array(
                'admin' => $this->request->input('admin', false),
                'partner' => $this->request->input('partner', false),
            ),
            'description' => $dataUserAfterInput['description'],
            'telephone' => $dataUserAfterInput['telephone'],
        );

        $arrayMessageFromSever = Method::httpPost(Connection::adminAddUser(),$dataUserForInsert,true);
        $result = $this->check -> adminUserCreate($arrayMessageFromSever);
        return $result;
    }

    public function getUpdate($id)
    {
        $dataFromSever = Method::httpGet(Connection::adminUserGetById($id),true);
        $result = $this->check -> adminUserGetById($dataFromSever);
        return $result;
    }

    public function postUpdate($id)
    {
        $dataUserAfterInput = $this->request->all();
        // Validator at here
        $validator = Validator::make($dataUserAfterInput, Rule::adminUserAdd(), Message::vietnamese());
        if($validator->fails())
        {
            return redirect()->route('get.admin.user.update', $id)->withErrors($validator)->withInput($this->request->except('password','repassword'));
        }
        $dataUserForInsert = array(
            'name'      =>  $dataUserAfterInput['name'],
            'email'     =>  $dataUserAfterInput['email'],
            'password'  =>  $dataUserAfterInput['password'],
            'role'      =>  array(
                'admin' => $this->request->input('admin', false),
                'partner' => $this->request->input('partner', false),
            ),
            'description' => $dataUserAfterInput['description'],
            'telephone' => $dataUserAfterInput['telephone'],
        );

        $arrayMessageFromSever = Method::httpPost(Connection::adminUserUpdate($id),$dataUserForInsert,true);
        $result = $this->check -> adminUserUpdate($arrayMessageFromSever, $id);
        return $result;
    }

    public function getRemove(){
        return redirect()->route('get.admin.user.list');
    }

    public function postRemove(){
        $arrayID = $this->request -> input('remove');
        if(!$this->request -> has('remove')){
            return redirect()->route('get.admin.user.list')->with('message_error','Vui lòng chọn người dùng bạn muốn xóa');
        }
        foreach($arrayID as $id => $value){
            $arrayMessageFromSever = Method::httpPost(Connection::adminUserRemove($id), false, true);
            $result = $this->check -> checkStatus401($arrayMessageFromSever);
            if($result != false){
                return $result;
            }
            // sleep(10);
        }
        return redirect()->route('get.admin.user.list')->with('message_success','Chúc mừng bạn đã xóa người dùng thành công');
    }

    public function getActivate()
    {
        $view = "admin.user.activate";
        $dataFromSever = Method::httpGet(Connection::adminUserGetAllUser(),true);
        $result = $this->check -> adminGetAllUser($dataFromSever, $view);
        return $result;
    }

    public function postActivate()
    {
        $arrayID = $this->request -> input('activate');
        foreach($arrayID as $id => $value){
            $arrayMessageFromSever = Method::httpPost(Connection::adminUserActivate($id), false, true);
            $result = $this->check -> checkStatus401($arrayMessageFromSever);
            if($result != false){
                return $result;
            }
        }
        return redirect()->route('get.admin.user.activate')->with('message_success','Chúc mừng bạn đã kích hoạt người dùng thành công');
    }

    public function getDeactivate()
    {
        $view = "admin.user.deactivate";
        $dataFromSever = Method::httpGet(Connection::adminUserGetAllUser(),true);
        $result = $this->check -> adminGetAllUser($dataFromSever, $view);
        return $result;
    }

    public function postDeactivate()
    {
        $arrayID = $this->request -> input('deactivate');
        foreach($arrayID as $id => $value){
            $arrayMessageFromSever = Method::httpPost(Connection::adminUserDeactivate($id), false, true);
            $result = $this->check -> checkStatus401($arrayMessageFromSever);
            if($result != false){
                return $result;
            }
//            sleep(5);
        }
        return redirect()->route('get.admin.user.deactivate')->with('message_success','Chúc mừng bạn đã bỏ kích hoạt người dùng thành công');
    }

    public function postSearch(){

    }
}
