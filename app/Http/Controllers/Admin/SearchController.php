<?php
/**
 * Created by PhpStorm.
 * User: tuananhleho1994
 * Date: 7/31/2015
 * Time: 3:08 PM
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Connection;
use Cookie;
use Method;

class SearchController extends Controller
{
    private $request;
    private $check;
    public function __construct(Request $request){
        $this->request = $request;
        $this->check = new \App\Http\Controllers\Admin\CheckController();
    }
    public function getList(){
        if(!$this->request->ajax()){
            return 1;
        }
        $dataInput = $this->request->input('dataInput');
        $dataFromSever = Method::httpGet(Connection::adminUserSearch($dataInput),true);
        $result = $this->check -> adminUserSearchList($dataFromSever);
        return $result;
    }

    public function getActivate(){
        if(!$this->request->ajax()){
            return 1;
        }
        $dataInput = $this->request->input('dataInput');
        $dataFromSever = Method::httpGet(Connection::adminUserSearch($dataInput),true);
        $result = $this->check -> adminUserSearchActivate($dataFromSever);
        return $result;
    }

    public function getDeactivate(){
        if(!$this->request->ajax()){
            return 1;
        }
        $dataInput = $this->request->input('dataInput');
        $dataFromSever = Method::httpGet(Connection::adminUserSearch($dataInput),true);
        $result = $this->check -> adminUserSearchDeactivate($dataFromSever);
        return $result;
    }
}