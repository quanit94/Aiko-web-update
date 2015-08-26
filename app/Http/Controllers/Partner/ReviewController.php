<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Connection;
use Method;
use Cookie;
class ReviewController extends Controller {

    private $request;
    private $check;

    public function __construct(Request $request) {
        $this->request = $request;
        $this->check = new \App\Http\Controllers\Partner\CheckController();
    }

    public function getReview($id) {
        $arrayMessageFromSever = Method::httpGet(Connection::reviewGet($id),true);
        $result = $this->check->reviewGet($arrayMessageFromSever);
        if($result == 200)
            return view('partner.restaurant.review', ['ReviewRestaurant'=>$arrayMessageFromSever['data']])->with('titlePage','Aiko | List Review Restaurant');
    }

}
